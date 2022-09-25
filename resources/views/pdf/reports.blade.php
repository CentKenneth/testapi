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
        font-size: 30px;
    }
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>

<body>
    <div style="padding: 20px;">
        <h4 class="title-2">Appointment Reports</h4>

        <div style="width: 100%;">
            <table  style="width: 100%">
                <thead>
                    <tr>
                        <td style="width: 30%; padding: 10px; font-weight: bold; font-text: 15px;">
                            Patient Name
                        </td>
                        <td style="width: 30%; padding: 10px; font-weight: bold; font-text: 15px;">
                            Email
                        </td>
                        <td style="width: 25%; padding: 10px; font-weight: bold; font-text: 15px;">
                            Mobile
                        </td>
                        <td style="width: 15%; padding: 10px; font-weight: bold; font-text: 15px;">
                            No. of Transactions
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas['data'] as $data)
                        <tr>
                            <td style="width: 30%; padding: 10px;">
                                {{$data['patient_name']}}
                            </td>
                            <td style="width: 30%; padding: 10px;">
                                {{$data['patient_email']}}
                            </td>
                            <td style="width: 25%; padding: 10px;">
                                {{$data['patient_phone']}}
                            </td>
                            <td style="width: 15%; padding: 10px;">
                                {{$data['num_trans']}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</body>

</html>