<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="x-apple-disable-message-reformatting">
  <title>Tickets QR</title>
  <style>
    table, td, div, h1, p {
      font-family: Arial, sans-serif;
    }
    @media screen and (max-width: 530px) {
      .unsub {
        display: block;
        padding: 8px;
        margin-top: 14px;
        border-radius: 6px;
        background-color: #555555;
        text-decoration: none !important;
        font-weight: bold;
      }
      .col-lge {
        max-width: 100% !important;
      }
    }
    @media screen and (min-width: 531px) {
      .col-sml {
        max-width: 27% !important;
      }
      .col-lge {
        max-width: 73% !important;
      }
    }
  </style>
</head>
<body style="margin:0;padding:0;word-spacing:normal;background-color:#eae6db; height: 600px;">
  <div role="article" aria-roledescription="email" lang="en" style="text-size-adjust:100%;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;background-color:#eae6db;">
    <table role="presentation" style="width:100%;border:none;border-spacing:0;">
      <tr>
        <td align="center" style="padding:0;">
          <table role="presentation" style="width:94%;max-width:600px;border:none;border-spacing:0;text-align:left;font-family:Arial,sans-serif;font-size:16px;line-height:22px;color:#363636;">
            <tr>
              <td style="padding:40px 30px 30px 30px;text-align:center;font-size:24px;font-weight:bold;">
                <a href="http://www.example.com/" style="text-decoration:none;">
                  <img src="https://pristineofficial.com/assets/images/Update%2001-02-2023/01.%20Logo%20(Home).png" width="165" alt="Logo" style="width:165px;max-width:80%;height:auto;border:none;text-decoration:none;color:#ffffff;">

                </a>
              </td>
            </tr>
            <tr>
              <td style="padding:30px;background-color:#ffffff;">
                <h1 style="margin-top:0;margin-bottom:16px;font-size:26px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;">Kamu Mendapatkan Email..</h1>
                <p style="margin:0;">
                  <br>
                  Selamat datang di Event kami #YOGA Berikut QR Kamu ntuk Melaksanakan Kunjungan Ke Kelas Yoga.
                  <br><br>
                  <div>
                    {{-- {!!DNS2D::getBarcodeHTML($user->tickets_code, 'QRCODE',15,15)!!} --}}
                    <?php
                        $qrCodeAsPng = QrCode::format('png')->size(500)->generate($user->tickets_code);
                    ?>
                    <img src="{{ $message->embedData($qrCodeAsPng, 'qrcodeAbsensiYoga.png') }}" />
                </p>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </div>
  <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
</body>
</html>

