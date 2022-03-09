<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prescription</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>

<style>
    .title {
        text-align: center;
        color: lightblue;
        font-size: 53px;
    }
    .title-2 {
        text-align: center;
    }
    .sub-title, .table, .body-text{
        width: 100%;
        font-size: 26px;
    }

    .text-right{
        text-align: right;
    }
</style>

<body>
    <div style="padding: 10px">
        <h2 class="title">MEENC</h2>

        <h3 class="title-2">Clinic Name</h3>
        <h3 class="title-2">Address</h3>

        <div class="body-text" style="margin-top: 30px;">
            <table  class="table">
                <thead>
                    <tr>
                        <td style="width: 70%">
                            Name:
                            sdfds
                        </td>
                        <td style="width: 30%">
                            Date:
                            sdfds
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%">
                            Age:
                            sdfds
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%">
                            Address:
                            sdfds
                        </td>
                    </tr>
                </thead>
            </table>
        </div>

        <img style="width: 80px" src="{{ URL::to('/') }}/uploads/images/rx.png" alt="">

        <div class="body-text" style="margin-top: -20px; margin-left: 30px;">
            <table  class="table">
                <thead>
                    <tr>
                        <td style="width: 50%">
                            OD:
                            sdfds
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%">
                            OS:
                            sdfds
                        </td>
                    </tr>
                </thead>
            </table>
        </div>

        <div class="body-text" style="margin-top: 20px;">
            <div>
                Frame:
            </div>
            <div>
                Lens:
            </div>
            <div style="margin-top: 20px;">
                Amount:
            </div>
            <div>
                Deposit:
            </div>
            <div>
                Balance:
            </div>
        </div>

        <div style="position:absolute; bottom: 0px; right: 20px;">
            <img style="width: 80px; margin-left: 10px;" src="{{ URL::to('/') }}/uploads/images/prescription.jpg" alt="">
            <div>__________________</div>
            <div style="margin-left: 20px; margin-top:10px;">Dr. leonhail</div>
            <div style="margin-left: 20px; margin-top:10px;">23232323</div>
        </div>

        <div style="position:absolute; bottom: 0px; left: 20px;">
            <div>__________________</div>
            <div style="margin-left: 20px; margin-top:10px;">Patient Signature</div>
        </div>

    </div>

    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>

</html>