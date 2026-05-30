<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
    <body style="margin:0; padding:0; background-color:#f7f4f4; font-family:Arial, Helvetica, sans-serif;">
        <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f7f4f4; padding:20px 0;">
            <tr>
                <td align="center">
                    <table width="600" cellpadding="0" cellspacing="0"
                        style="background-color:#ffffff; border-radius:6px; overflow:hidden;">
                        <tr>
                            <td style="background-color:#d9c3a3; padding:20px; text-align:center;">
                                <h1 style="color:#ffffff; margin:0; font-size:22px;">
                                     Contact Us
                                </h1>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:30px; color:#333333;">
                                <p style="font-size:16px; margin:0 0 15px;">
                                    Hello , {{ $data['name'] }}
                                </p>
                                <p style="font-size:14px; line-height:1.6; margin:0 0 20px;">
                                    Thank you for contacting with us, we will connect with you in 1-2 working days.
                                </p>
                                <p style="font-size:14px; margin-top:30px;">
                                    Regards,<br>
                                    <strong>Event Planner Management System</strong>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="background-color:#f7f4f4; padding:15px; text-align:center;">
                                <p style="font-size:12px; color:#777777; margin:0;">
                                    © {{ date('Y') }} Event Planner Management System. All rights reserved.
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>
