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
    .sub-title, .table, .body-text{
        width: 100%;
        font-size: 26px;
    }

    .text-right{
        text-align: right;
    }
</style>

<body>
    <div>
        <h2 class="title">MEENC</h2>

        <div class="sub-title">
            <table class="table" style="border-bottom: 3px solid lightblue;">
                <thead>
                    <tr>
                        <td style="width: 50%">
                            <!-- Dr. {{$datas['doctor']['name']}} -->
                        </td>
                        <td style="width: 50%" class="text-right">
                            <!-- {{$datas['doctor']['phone']}} -->
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%">
                            <!-- {{$datas['doctor']['street_address']}} {{$datas['doctor']['city']}} -->
                        </td>
                        <td style="width: 50%" class="text-right">
                            #2423242242
                        </td>
                    </tr>
                </thead>
            </table>
        </div>

        <div class="body-text" style="margin-top: 30px;">
            <table  class="table">
                <thead>
                    <tr>
                        <td style="width: 50%">
                            Name:
                            <!-- Name: {{$datas['patient']['name']}} -->
                        </td>
                        <td style="width: 50%" class="text-right">
                            Age:
                            <!-- Age: {{$datas['patient']['bday']}} years old -->
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%">
                            Gender:
                            <!-- Gender: {{$datas['patient']['gender']}} -->
                        </td>
                        <td style="width: 50%" class="text-right">
                            Date:
                            <!-- Date: {{ \Carbon\Carbon::parse($datas['prescription']['created_at'])->format('d/m/Y')}} -->
                        </td>
                    </tr>
                </thead>
            </table>
        </div>

        <div class="body-text" style="margin-top: 20px;">
            <div>
                Prescription:
            </div>
            <div>
                <!-- {{$datas['prescription']['prescription']}} -->
            </div>
        </div>

        <img style="width: 80px" src="{{ URL::to('/') }}/uploads/images/prescription.jpg" alt="">

    </div>

    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>

</html>