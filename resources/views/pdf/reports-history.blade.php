<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Patient Appointment History</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>

<style lang="scss">
    .title {
        text-align: center;
        color: lightblue;
        font-size: 53px;
    }
    .body-table {
        border: 1px solid black;
        border-collapse: collapse;
    }
    
    .pa-1 {
        padding: 2px;
        font-size: 14px;
    }
</style>

<body>
    <div>
        <table>
            <tr>
                <td style="width: 90%">
                    <div class="pa-1" style="font-weight: bold;">
                        DELFIN OPTICAL CLINIC - PANABO
                    </div>
                    <div class="pa-1">
                        Location: Brgy. New Pandan, New Integrated Bus and Jeepney Terminal, Panabo City
                    </div>
                    <div class="pa-1">
                        Contact No. 0945-677-4914/0948-361-0177
                    </div>
                    <div class="pa-1">
                        Facebook: @delfinopticalclinic 
                    </div>
                    <div class="pa-1">
                        Email: delfinopticalclinic@gmail.com
                    </div>
                    <div class="pa-1" style="font-weight: bold;">
                        Dr. Edwin King Xing John M. Delfin   Dr. Edwin Shielle Justin M. Delfin	
                    </div>
                </td>
                <td style="width: 10%">
                    <img style="width: 180px" src="{{ URL::to('/') }}/uploads/images/doc-logo.png" alt="">
                </td>
            </tr>
        </table>
    </div>

    <div>
        <hr>
    </div>

    <div>
        <h3>Patient Appointment History</h3>

        <div style="width: 100%;">
            <table class="body-table"  style="width: 100%">
                <thead>
                    <tr class="body-table">
                        <td class="body-table" style="width: 20%; padding: 10px; font-weight: bold; font-text: 15px;">
                            Patient Name
                        </td>
                        <td class="body-table" style="width: 20%; padding: 10px; font-weight: bold; font-text: 15px;">
                            Email
                        </td>
                        <td class="body-table" style="width: 10%; padding: 10px; font-weight: bold; font-text: 15px;">
                            Mobile
                        </td>
                        <td class="body-table" style="width: 10%; padding: 10px; font-weight: bold; font-text: 15px;">
                            Schedule Date
                        </td>
                        <td class="body-table" style="width: 10%; padding: 10px; font-weight: bold; font-text: 15px;">
                            Schedule Time
                        </td>
                        <td class="body-table" style="width: 20%; padding: 10px; font-weight: bold; font-text: 15px;">
                            Symptoms
                        </td>
                        <td class="body-table" style="width: 10%; padding: 10px; font-weight: bold; font-text: 15px;">
                            Status
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas['data'] as $data)
                        <tr class="body-table">
                            <td class="body-table" style="width: 20%; padding: 10px;">
                                {{$data['patient_name']}}
                            </td>
                            <td class="body-table" style="width: 20%; padding: 10px;">
                                {{$data['patient_email']}}
                            </td>
                            <td class="body-table" style="width: 10%; padding: 10px;">
                                {{$data['patient_phone']}}
                            </td>
                            <td class="body-table" style="width: 10%; padding: 10px;">
                                {{date('d-m-Y', strtotime($data['schedule']));}}
                            </td>
                            <td class="body-table" style="width: 10%; padding: 10px;">
                                {{date('H:m a', strtotime($data['schedule']))}}
                            </td>
                            <td class="body-table" style="width: 20%; padding: 10px;">
                                {{$data['diagnosis']}}
                            </td>
                            <td class="body-table" style="width: 10%; padding: 10px;">
                                {{$data['status']}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</body>

</html>