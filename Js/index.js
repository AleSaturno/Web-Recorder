let localCamStream,
	localScreenStream,
	localOverlayStream,
	rafId,
	cam,
	screen,
	mediaRecorder,
	audioContext,
	audioDestination;

let mediaWrapperDiv1 = document.getElementById("Frame-2");
let mediaWrapperDiv2 = document.getElementById("Frame-4");
let mediaWrapperDiv3 = document.getElementById("Frame-5");
let startWebcamBtn = document.getElementById("Rectangle-9");
let startScreenShareBtn = document.getElementById("Rectangle-25");
let mergeStreamsBtn = document.getElementById("Rectangle-28");
let startRecordingBtn = document.getElementById("Rectangle-4");
let stopRecordingBtn = document.getElementById("Rectangle-80");
let stopAllStreamsBtn = document.getElementById("stopAllStreams");
let canvasElement = document.createElement("canvas");
let canvasCtx = canvasElement.getContext("2d");
let encoderOptions = { mimeType: "video/webm; codecs:vp9" };
let recordedChunks = [];
let audioTracks = [];

/**
 * Internal Polyfill to simulate
 * window.requestAnimationFrame
 * since the browser will kill canvas
 * drawing when tab is inactive
 */
const requestVideoFrame = function (callback) {
	return window.setTimeout(function () {
		callback(Date.now());
	}, 1000 / 60); // 60 fps - just like requestAnimationFrame
};

/**
 * Internal polyfill to simulate
 * window.cancelAnimationFrame
 */
const cancelVideoFrame = function (id) {
	clearTimeout(id);
};

async function startWebcamFn() {
	localCamStream = await navigator.mediaDevices.getUserMedia({
		video: true,
		audio: { deviceId: { ideal: "communications" } }
	});
	if (localCamStream) {
		cam = await attachToDOM("justWebcam", localCamStream);
	}
}

async function startScreenShareFn() {
	localScreenStream = await navigator.mediaDevices.getDisplayMedia({
		video: true,
		audio: true
	});
	if (localScreenStream) {
		screen = await attachToDOM2("justScreenShare", localScreenStream);
	}
}

async function stopAllStreamsFn() {
	let respuesta = confirm("Seguro/a quiere Eliminar Todas las imagenes?");

	if (respuesta === true) {
		window.location.reload();
		return true;
} 	else{
		return false;
	}
}


async function makeComposite() {
	if (cam && screen) {
	  canvasCtx.save();
	  canvasElement.setAttribute("width", "1920");
	  canvasElement.setAttribute("height", "1080");
	  canvasCtx.clearRect(0, 0, 1920, 1080);
	  const camWidth = 1920 / 4;
	  const camHeight = 1080 / 4;
	  const camX = 1920 - camWidth;
	  const camY = 0;
	  canvasCtx.drawImage(
		cam,
		camX,
		camY,
		camWidth,
		camHeight
	  ); // position camera stream to top right
	  canvasCtx.drawImage(
		screen,
		0,
		0,
		screen.videoWidth,
		screen.videoHeight,
		0,
		0,
		1920 - camWidth,
		1080
	  ); // scale and position screen stream to top left
	  let imageData = canvasCtx.getImageData(
		0,
		0,
		1920,
		1080
	  ); // this makes it work
	  canvasCtx.putImageData(imageData, 0, 0); // properly on safari/webkit browsers too
	  canvasCtx.restore();
	  rafId = requestVideoFrame(makeComposite);
	}
}


async function mergeStreamsFn() {
	document.getElementById("Rectangle-28").style.display = "block";
	await makeComposite();
	audioContext = new AudioContext();
	audioDestination = audioContext.createMediaStreamDestination();
	let fullVideoStream = canvasElement.captureStream();
	let existingAudioStreams = [
		...(localCamStream ? localCamStream.getAudioTracks() : []),
		...(localScreenStream ? localScreenStream.getAudioTracks() : [])
	];
	audioTracks.push(
		audioContext.createMediaStreamSource(
			new MediaStream([existingAudioStreams[0]])
		)
	);
	if (existingAudioStreams.length > 1) {
		audioTracks.push(
			audioContext.createMediaStreamSource(
				new MediaStream([existingAudioStreams[1]])
			)
		);
	}
	audioTracks.map((track) => track.connect(audioDestination));
	console.log(audioDestination.stream);
	localOverlayStream = new MediaStream([...fullVideoStream.getVideoTracks()]);
	let fullOverlayStream = new MediaStream([
		...fullVideoStream.getVideoTracks(),
		...audioDestination.stream.getTracks()
	]);
	console.log(localOverlayStream, existingAudioStreams);
	if (localOverlayStream) {
		overlay = await attachToDOM3("pipOverlayStream", localOverlayStream);
		mediaRecorder = new MediaRecorder(fullOverlayStream, encoderOptions);
		mediaRecorder.ondataavailable = handleDataAvailable;
		overlay.volume = 0;
		cam.volume = 0;
		screen.volume = 0;
		cam.style.display = "none";
		// localCamStream.getAudioTracks().map(track => { track.enabled = false });
		screen.style.display = "none";
		// localScreenStream.getAudioTracks().map(track => { track.enabled = false });
	}
}

async function startRecordingFn()  {
	mediaRecorder.videoBitsPerSecond = 3000000; // 3Mbps
    mediaRecorder.start();
	console.log(mediaRecorder.state);
	console.log("recorder started");
	document.getElementById("pipOverlayStream").style.border = "10px solid red";
	document.getElementById("recordingState").innerHTML = `${mediaRecorder.state}...`;
}
// ////////////////////////////////////////////////////////////
async function attachToDOM(id, stream) {
	if (id !== "justWebcam") {
	  return null;
	}
  
	let videoElem = document.createElement("video");
	videoElem.id = id;
	videoElem.width = 640;
	videoElem.height = 360;
	videoElem.autoplay = true;
	videoElem.setAttribute("playsinline", true);
	videoElem.srcObject = new MediaStream(stream.getTracks());
	mediaWrapperDiv1.appendChild(videoElem);
	return videoElem;
  }

  async function attachToDOM2(id, stream) {
	if (id !== "justScreenShare") {
	  return null;
	}
  
	let videoElem = document.createElement("video");
	videoElem.id = id;
	videoElem.width = 640;
	videoElem.height = 360;
	videoElem.autoplay = true;
	videoElem.setAttribute("playsinline", true);
	videoElem.srcObject = new MediaStream(stream.getTracks());
	mediaWrapperDiv2.appendChild(videoElem);
	return videoElem;
  }

  async function attachToDOM3(id, stream) {
	if (id !== "pipOverlayStream") {
	  return null;
	}
  
	let videoElem = document.createElement("video");
	videoElem.id = id;
	videoElem.width = 640;
	videoElem.height = 360;
	videoElem.autoplay = true;
	videoElem.setAttribute("playsinline", true);
	videoElem.srcObject = new MediaStream(stream.getTracks());
	mediaWrapperDiv3.appendChild(videoElem);
	return videoElem;
  }




///////////////////////////////////////////////////////////////////////////
function handleDataAvailable(event) {
	console.log("data-available");
	if (event.data.size > 0) {
		recordedChunks.push(event.data);
		console.log(recordedChunks);
		download();
	} else {
	}
}

function download() {
    var blob = new Blob(recordedChunks, {
		type: "video/mp4"
	});
	var url = URL.createObjectURL(blob);
	var a = document.createElement("a");
	document.body.appendChild(a);
	a.style = "display: none";
	a.href = url;
	a.download = "Video.mp4";
	a.click();
	window.URL.revokeObjectURL(url);
}

function stopRecordingFn() {
	mediaRecorder.stop();
	document.getElementById(
		"recordingState"
	).innerHTML = `${mediaRecorder.state}...`;
}

startWebcamBtn.addEventListener("click", startWebcamFn);
startScreenShareBtn.addEventListener("click", startScreenShareFn);
mergeStreamsBtn.addEventListener("click", mergeStreamsFn);
// stopAllStreamsBtn.addEventListener("click", stopAllStreamsFn);
startRecordingBtn.addEventListener("click", startRecordingFn);
stopRecordingBtn.addEventListener("click", stopRecordingFn);