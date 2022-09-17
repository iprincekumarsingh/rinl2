<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scanner</title>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <link rel="stylesheet" href="https://scanapp.org/assets/app.css">
    <link rel="stylesheet" href="https://scanapp.org/assets/main.css">
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-2KZEP7DPYH');
    </script>

</head>

<body>
    <script>
        // To use Html5QrcodeScanner (more info below)

    </script>
</body>
<div>
    <div id="scanapp-top-container">
        <div id="scanapp-container">
            <div id="scanner">

                <div id="reader"></div>
                <div class="empty"></div>
            </div>
            <div id="workspace">
                <div class="workspace-header">Scanned result</div>
                <div id="no-result-container">Scan to get results</div>
                <div id="new-scanned-result">
                    <div class="header">
                        New <span id="scan-result-code-type">{code}</span> detected!
                    </div>
                    <div class="section">
                        <div class="image" id="scan-result-image"></div>
                        <div class="data">
                            <table id="result_table">
                                <tr>
                                    <!-- <td>Parsed</td> -->
                                    <td colspan="2">
                                        <div>
                                            <div class="badge">
                                                <div class="badge-icon">
                                                    <span><b>Type</b></span>
                                                </div>
                                                <div class="badge-text">
                                                    <span id="scan-result-badge-body">{type}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="scan-result-parsed">{parsed result here}</div>
                                    </td>
                                </tr>
                                <tr style="display: none">
                                    <td>Actions</td>
                                    <td>
                                        <img class="action_image" id="action-share"
                                            src="./assets/svg/share-svgrepo-com.svg">
                                        <img class="action_image" id="action-copy"
                                            src="./assets/svg/copy-svgrepo-com.svg">
                                        <img class="action_image" id="action-payment"
                                            src="./assets/svg/coin-svgrepo-com.svg" style="display: none">
                                    </td>
                                </tr>




                            </table>

                            <div id="body-footer">
                                <button id="scan-result-close">Close and scan another</button>
                                <script>
                                    let html = document.getElementsByClassName("scan-result-text").innerHTML;
                                    $('scan-result-text').on('change', function() {
                                alert( this.value );
                                });
                                </script>
                                <form action="{{url('log/complain')}}" method="get">
@csrf
                                    <textarea hidden name="uid" id="scan-result-text" cols="30"
                                        rows="10">{text result here}</textarea>
                                    <input type="submit" value="View Machine Deta">
                                </form>
                                <form action="{{url('log/complain')}}" method="get">
@csrf
                                    <textarea hidden name="uid" id="scan-result-text" cols="30"
                                        rows="10">{text result here}</textarea>
                                    <input type="submit" value="View Machine Deta">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="history">
                    <div class="workspace-header">Scan History</div>
                    <div id="history-list"></div>
                </div>
            </div>
        </div>

    </div>

    <div class="banners-container">
        <div class="banners">
            <div class="banner error">
                <div class="banner-icon"><i data-eva="alert-circle-outline" data-eva-fill="#ffffff" data-eva-height="48"
                        data-eva-width="48"></i></div>
                <div class="banner-message" id="banner-error-message">{}</div>
                <div class="banner-close" onclick="hideBanners()"><i data-eva="close-outline"
                        data-eva-fill="#ffffff"></i></div>
            </div>
            <div class="banner success">
                <div class="banner-icon"><i data-eva="checkmark-circle-outline" data-eva-fill="#ffffff"
                        data-eva-height="48" data-eva-width="48"></i></div>
                <div class="banner-message" id="banner-success-message">{}</div>
                <div class="banner-close" onclick="hideBanners()"><i data-eva="close-outline"
                        data-eva-fill="#ffffff"></i></div>
            </div>
        </div>
    </div>


    <script src="https://scanapp.org/assets/js/html5-qrcode.min.v2.2.0.js"></script>
    <script src="qr.js"></script>
