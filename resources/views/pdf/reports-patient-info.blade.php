<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Patient Information</title>
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
    <div style="width: 100%;">
        <table style="width: 100%;">
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
        <h3 style="margin-top: 5px; margin-bottom: 5px;">
            Patient Information
        </h3>
        <div>
            <table style="width: 100%;">
                <tr>
                    <td style="width: 60%">
                        Px Name: {{ $datas['data'][0]['patient_name'] ? $datas['data'][0]['patient_name'] : '_____________' }}
                    </td>
                    <td style="width: 40%">
                        <table style="width: 100%;">
                            <tr>
                                <td style="width: 50%">
                                    Date: {{ date('Y-m-d') }}
                                </td>
                                <td style="width: 50%">
                                    Age: {{ $datas['data'][0]['bday'] ? $datas['data'][0]['bday'] : '_____________' }}
                                </td>
                            </tr>
                        </table>
                        
                    </td>
                </tr>
            </table>
           
            <div>
                Address: {{ $datas['data'][0]['address'] ? $datas['data'][0]['address'] : '_____________' }}
            </div>

            <h3>
                Case History:
            </h3>

            <div>
                <table>
                    <tr>
                        <td>
                            <input type="checkbox" style="margin-top: 2px; font-size: 11px;"> <label style="font-size: 11px;">Hypertension</label>  
                        </td>
                        <td>
                            <input type="checkbox" style="margin-top: 2px; font-size: 11px;"> <label style="font-size: 11px;">Diabetes</label>   
                        </td>
                        <td>
                            <input type="checkbox" style="margin-top: 2px; font-size: 11px;"> <label style="font-size: 11px;">High Uric Acid</label> 
                        </td>
                        <td>
                            <input type="checkbox" style="margin-top: 2px; font-size: 11px;"> <label style="font-size: 11px;">Others: {{ $datas['data'][0]['other_complaints'] ? $datas['data'][0]['other_complaints'] : '_____________' }}</label> 
                        </td>
                    </tr>
                </table>
                <div>
                    <table>
                        <tr>
                            <td>
                                Chief Complaint(s): 
                            </td>
                            <td>
                                <input type="checkbox" style="margin-top: 2px; font-size: 11px;"> <label style="font-size: 11px;">BOV@Near</label>  
                            </td>
                            <td>
                                <input type="checkbox" style="margin-top: 2px; font-size: 11px;"> <label style="font-size: 11px;">BOV@Far </label>  
                            </td>
                            <td>
                                <input type="checkbox" style="margin-top: 2px; font-size: 11px;"> <label style="font-size: 11px;">BOV@F&N</label> 
                            </td>
                            <td>
                                <input type="checkbox" style="margin-top: 2px; font-size: 11px;"> <label style="font-size: 11px;">Headache</label>   
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" style="margin-top: 2px; font-size: 11px;"> <label style="font-size: 11px;">  Dizziness  </label>
                            </td>
                            <td>
                                <input type="checkbox" style="margin-top: 2px; font-size: 11px;"> <label style="font-size: 11px;">Nausea</label>   
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div style="font-size: 11px;">
                Other Complaints: {{ $datas['data'][0]['other_complaints'] ? $datas['data'][0]['other_complaints'] : '______________________________________________________________' }} 
            </div>

            <h3>
                External Examination:
            </h3>

            <table style="width: 100%">
                <tr>
                    <td style="width: 25%; font-size: 11px;">
                        Cornea: {{ $datas['data'][0]['cornea'] ? $datas['data'][0]['cornea'] : '_____________' }}
                    <td style="width: 25%; font-size: 11px;">
                        Conjunctiva: {{ $datas['data'][0]['conjunctiva'] ? $datas['data'][0]['conjunctiva'] : '_____________' }}
                    </td>
                    <td style="width: 25%; font-size: 11px;">
                        Eyelids: {{ $datas['data'][0]['eyelids'] ? $datas['data'][0]['eyelids'] : '_____________' }}
                    </td>
                    <td style="width: 25%; font-size: 11px;">
                        MGD: {{ $datas['data'][0]['mgd'] ? $datas['data'][0]['mgd'] : '_____________' }}
                    </td>
                </tr>
            </table>

            <table style="width: 100%">
                <tr>
                    <td style="width: 25%; font-size: 11px;">
                        Lens: {{ $datas['data'][0]['lens'] ? $datas['data'][0]['lens'] : '_____________' }}
                    </td>
                    <td style="width: 25%; font-size: 11px;">
                        Pupil: {{ $datas['data'][0]['pupil'] ? $datas['data'][0]['pupil'] : '_____________' }}
                    </td>
                    <td style="width: 25%; font-size: 11px;">
                        Iris: {{ $datas['data'][0]['iris'] ? $datas['data'][0]['iris'] : '_____________' }}
                    </td>
                    <td style="width: 25%; font-size: 11px;">
                        Puncta: {{ $datas['data'][0]['puncta'] ? $datas['data'][0]['puncta'] : '_____________' }}
                    </td>
                </tr>
            </table>

            <h3>
                Refraction:
            </h3>

            <div style="padding-top: 5px;padding-bottom: 5px;">
                OLDRX:
            </div>
            <table style="width: 100%; font-size: 11px;">
                <tr>
                    <td style="width: 25%">
                        OD: {{ $datas['data'][0]['oldrx_od'] ? $datas['data'][0]['oldrx_od'] : '____' }}
                    </td>
                    <td style="width: 25%">
                        sph= {{ $datas['data'][0]['oldrx_sph'] ? $datas['data'][0]['oldrx_sph'] : '____' }}
                    </td>
                    <td style="width: 25%">
                        cx: {{ $datas['data'][0]['oldrx_cx'] ? $datas['data'][0]['oldrx_cx'] : '____' }}
                    </td>
                    <td style="width: 25%">
                        OS: {{ $datas['data'][0]['oldrx_os'] ? $datas['data'][0]['oldrx_os'] : '____' }}
                    </td>
                </tr>
                <tr>
                    <td style="width: 25%">
                        sph= {{ $datas['data'][0]['oldrx_os_sph'] ? $datas['data'][0]['oldrx_os_sph'] : '____' }}
                    </td>
                    <td style="width: 25%">
                        cx: {{ $datas['data'][0]['oldrx_os_cx'] ? $datas['data'][0]['oldrx_os_cx'] : '____' }}
                    </td>
                    <td style="width: 25%">
                        ADD: {{ $datas['data'][0]['oldrx_add'] ? $datas['data'][0]['oldrx_add'] : '____' }}
                    </td>
                </tr>
            </table>

            <div style="padding-top: 5px;padding-bottom: 5px;">
                NEWRX:
            </div>
            <table style="width: 100%; font-size: 11px;">
                <tr>
                    <td style="width: 25%">
                        OD:  {{ $datas['data'][0]['newrx_od'] ? $datas['data'][0]['newrx_od'] : '____' }}
                    </td>
                    <td style="width: 25%">
                        sph= {{ $datas['data'][0]['newrx_sph'] ? $datas['data'][0]['newrx_sph'] : '____' }}
                    </td>
                    <td style="width: 25%">
                        cx: {{ $datas['data'][0]['newrx_cx'] ? $datas['data'][0]['newrx_cx'] : '____' }}
                    </td>
                    <td style="width: 25%">
                        OS: {{ $datas['data'][0]['newrx_os'] ? $datas['data'][0]['newrx_os'] : '____' }}
                    </td>
                </tr>
                <tr>
                    <td style="width: 25%">
                        sph= {{ $datas['data'][0]['newrx_os_sph'] ? $datas['data'][0]['newrx_os_sph'] : '____' }}
                    </td>
                    <td style="width: 25%">
                        cx: {{ $datas['data'][0]['newrx_os_cx'] ? $datas['data'][0]['newrx_os_cx'] : '____' }}
                    </td>
                    <td style="width: 25%">
                        ADD: {{ $datas['data'][0]['newrx_add'] ? $datas['data'][0]['newrx_add'] : '____' }}
                    </td>
                </tr>
            </table>

            <div style="padding-top: 5px;padding-bottom: 5px;">
                FVA:
            </div>

            <table style="width: 100%; font-size: 11px;">
                <tr>
                    <td style="width: 25%">
                        ODsc: {{ $datas['data'][0]['fva_odsc'] ? $datas['data'][0]['fva_odsc'] : '____ ' }} /20
                    </td>
                    <td style="width: 25%">
                        OSsc: {{ $datas['data'][0]['fva_ossc'] ? $datas['data'][0]['fva_ossc'] : '____ ' }} /20
                    </td>
                    <td style="width: 25%">
                        OUsc: {{ $datas['data'][0]['fva_ousc'] ? $datas['data'][0]['fva_ousc'] : '____ ' }} /20
                    </td>
                    <td style="width: 25%">
                        ODcc: {{ $datas['data'][0]['fva_odcc'] ? $datas['data'][0]['fva_odcc'] : '____ ' }} /20
                    </td>
                </tr>
                <tr>
                    <td style="width: 25%">
                        OScc: {{ $datas['data'][0]['fva_oscc'] ? $datas['data'][0]['fva_oscc'] : '____ ' }} /20
                    </td>
                    <td style="width: 25%">
                        OUcc: {{ $datas['data'][0]['fva_oucc'] ? $datas['data'][0]['fva_oucc'] : '____ ' }} /20
                    </td>
                </tr>
            </table>

            <div style="padding-top: 5px;padding-bottom: 5px;">
                NVA: 
            </div>

            <table style="width: 100%; font-size: 11px;">
                <tr>
                    <td style="width: 25%">
                        OUsc: {{ $datas['data'][0]['nva_ousc'] ? $datas['data'][0]['nva_ousc'] : '____ ' }} /6
                    </td>
                    <td style="width: 25%">
                        OUcc: {{ $datas['data'][0]['nva_oucc'] ? $datas['data'][0]['nva_oucc'] : '____ ' }} /6
                    </td>
                    <td style="width: 25%">
                        PD: OD {{ $datas['data'][0]['nva_pdod'] ? $datas['data'][0]['nva_pdod'] : '____ ' }}
                    </td>
                    <td style="width: 25%">
                        OS:{{ $datas['data'][0]['nva_pdos'] ? $datas['data'][0]['nva_pdos'] : '____ ' }} 
                    </td>
                </tr>
                <tr>
                    <td style="width: 25%">
                        OU:{{ $datas['data'][0]['nva_pdou'] ? $datas['data'][0]['nva_pdou'] : '____ ' }} 
                    </td>
                </tr>
            </table>

            <table style="width: 100%; margin-top: 15px; font-size: 11px;">
                <tr>
                    <td style="width: 50%">
                        Diagnosis: {{ $datas['data'][0]['doctor_diagnosis'] ? $datas['data'][0]['doctor_diagnosis'] : '_____________' }}
                    </td>
                    <td style="width: 50%">
                        Management:{{ $datas['data'][0]['management'] ? $datas['data'][0]['management'] : '_____________' }}
                    </td>
                </tr>
                <tr>
                    <td style="width: 50%">
                        Type of Lens:{{ $datas['data'][0]['type_lens'] ? $datas['data'][0]['type_lens'] : '_____________' }}
                    </td>
                    <td style="width: 50%">
                        Type of Frame:{{ $datas['data'][0]['type_frame'] ? $datas['data'][0]['type_frame'] : '_____________' }}
                    </td>
                </tr>
            </table>

            <table style="width: 100%; margin-top: 15px;">
                <tr>
                    <td style="width: 50%">
                        Amount     : _____________	
                    </td>
                    <td style="width: 50%">
                        Terms:     : _____________	
                    </td>
                </tr>
            </table>

            <div>
                Deposit     : _____________
            </div>
            <div>
                Balance     : _____________
            </div>

            <table style="width: 100%; margin-top: 11px;">
                <tr>
                    <td style="width: 80%">
                        <div>
                        _______________________________
                        </div>
                        <div style="font-size: 11px;">
                            Patient’s Signature
                        </div>
                        <div style="font-size: 11px;">
                            Patient Contact No.: {{ $datas['data'][0]['patient_phone'] ? $datas['data'][0]['patient_phone'] : '_____________' }}
                        </div>
                    </td>
                    <td style="width: 20%">
                        <div style="text-align: center;">
                        _______________________________
                        </div>
                        <div style="text-align: center; font-size: 11px;">
                              Optometrist on Duty
                        </div>
                    </td>
                </tr>
            </table>

        </div>
    </div>

</body>

</html>