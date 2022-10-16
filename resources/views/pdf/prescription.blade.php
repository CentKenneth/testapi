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
       
        <div style="width: 100%;">
            <table style="width: 100%;">
                <thead>
                    <tr>
                        <td style="width: 70%;">
                            Patient Name: {{$datas['patient']['name']}}
                        </td>
                        <td style="width: 30%;">
                            Date: {{ \Carbon\Carbon::parse($datas['prescription']['created_at'])->format('d/m/Y')}}
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%">
                            Age: {{$datas['patient']['bday']}} years old
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%">
                            Gender: {{$datas['patient']['gender']}}
                        </td>
                    </tr>
                </thead>
            </table>
        </div>

        <img style="width: 80px;margin-top: 20px;" src="{{ URL::to('/') }}/uploads/images/rx.png" alt="">

        <div class="body-text" style="margin-top: -20px; margin-left: 80px;">
            <table  class="table">
                <thead>
                    <tr>
                        <td style="width: 50%">
                            OD:
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%">
                            OS:
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
            @if($datas['prescription']['signature'])
                <img style="width: 100px;margin-left: 20px;margin-bottom:-20px" src="{{ $datas['prescription']['signature'] }}" alt="">
            @endif
            <div>__________________</div>
            <div style="margin-left: 20px; margin-top:10px;">Dr. {{$datas['doctor']['name']}}</div>
            <div style="margin-left: 20px; margin-top:5px;">{{$datas['doctor']['phone']}}</div>
        </div>

        <div style="position:absolute; bottom: 0px; left: 20px;">
            <div>__________________</div>
            <div style="margin-left: 20px; margin-top:10px;">Patient Signature</div>
        </div>

    </div>

    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>

</html>