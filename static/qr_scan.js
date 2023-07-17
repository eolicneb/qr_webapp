var qrboxFunction = function(viewfinderWidth, viewfinderHeight) {
    let minEdgePercentage = 0.7; // 70%
    let minEdgeSize = Math.min(viewfinderWidth, viewfinderHeight);
    let qrboxSize = Math.floor(minEdgeSize * minEdgePercentage);
    return {
        width: qrboxSize,
        height: qrboxSize
    };
}

var html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", { fps: 10, qrbox: qrboxFunction, showTorchButtonIfSupported: true });

function onScanSuccess(decodedText, decodedResult) {
    console.log(`Scan result: ${decodedText}`, decodedResult);
    $("#qr_data").val(decodedText);
    $("#html5-qrcode-button-camera-stop").click();
}

html5QrcodeScanner.render(onScanSuccess);