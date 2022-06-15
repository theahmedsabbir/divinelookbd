<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">

    <style type="text/css">
        
        /* Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');
        /* Global CSS */
        html{
            scroll-behavior: smooth;
        }
        body{
            /*background: #525659;*/
            /*font-family: 'Poppins', sans-serif;*/
            font-family: 'Open Sans', sans-serif;
            font-size: 16px;
            color: #333333; 
        }
        h1, h2, h3, h4, h5, h6{
           font-family: 'Open Sans', sans-serif;
        }
        p{
            font-family: 'Open Sans', sans-serif;
            color: #333333;     
        }
        .img-fluid{
            max-width: 100%;
            height: auto;
        }

        .section-one{
            background: #fff;
            width: 700px;
            display: block;
            margin: 0 auto;
            margin-top: 60px;
            padding: 0px 50px;
        }
        .one{
            padding: 10px 35px 0px 35px;
        }
        .section-one p{
            color: #676666;
            font-size: 13px;
            margin-top: -15px;
        }
        .section-one h2{
            font-size: 36px;
            text-transform: uppercase;
            font-weight: 700;
            color: #fff;
    		text-align: right;
    		padding: 15px 10px;
    		margin: 0;
        }

        .section-one .two h1{
            color: #283592;
            font-size: 40px;
            font-weight: 800;
            margin-bottom: 0;
            padding-left: 0;
            margin-top: 0px;
        }
        .section-one .two p{
            color: #ec3485;
            font-weight: 700;
            font-size: 14px;
            margin: 0px;
        }
        .section-one .two .service{
            color: #434343;
            font-weight: 700;
        }
        .section-one .three p{
            color: #434343;
		    font-size: 13px;
		    margin-top: -2px;
		    font-weight: 500;
        }
        .section-one .pad h4{
            margin-top: 0px;
        }
        .section-two{
            background: #fff;
            width: 800px;
            display: block;
            margin: 0 auto;
            padding: 0px 50px 30px 50px;
        }
        .two{
            padding: 0px 35px;
        }
        .section-two h2{
            color: #283592;
            font-size: 40px;
            font-weight: 800;
            margin-bottom: 0;
        }
        .section-two p{
            color: #ec3485;
            font-weight: 700;
            font-size: 14px;
        }
        .section-two .serv{
            margin-bottom: 0;
        }
        .section-two .service{
            color: #434343;
            font-weight: 700;
        }

        .table .thead-dark th {
            font-size: 14px;
            background: #75797b;
            color: #fff;
            padding: 8px 0px;
        }
        .table-bordered th {
            font-size: 14px;
            padding: 10px 0px;
			color: #75797b;
        }
        .table-bordered td {
            font-size: 14px;
        }
        .table-bordered th {
            border: 1px solid #dee2e6;
            text-align: center;
        }
        .table-bordered td {
            border: 1px solid #dee2e6;
            text-align: center;
        }
        .table .thead-dark th {
            font-size: 14px;
            padding: 10px;
        }
        .table-bordered th {
            font-size: 14px;
            font-weight: 500;
        }
        .table-bordered td {
            font-size: 14px;
            font-weight: 500;
            padding: 10px;
        }


        .section-one .four p{
            color: #676666;
            font-size: 13px;
            margin-top: -15px;
        }
        .section-one .four h5{
            margin-top: -15px;
        }

        @media (max-width: 767.98px){
            .section-one{
                padding: 30px 10px 0px 10px;
                width: 100%;
                margin-top: 0px;
            }
            .section-one .col-md-2{
                width: 0%;
            }
            
            .one {
                
                padding: 20px 0px 0px 0px;
            }
            .section-one img {
                width: 200px;
                padding-bottom: 15px;
            }
            .section-one h2 {
                font-size: 19px;
            }

            .two {
                padding: 0px 0px;
            }


            .table .thead-dark th {
                font-size: 12px;
            }
            .table-bordered th {
                font-size: 12px;
            }
            .table-bordered {
                margin-left: -5px;
            }


        }

    </style>

  </head>

  <body>

    @php
        $data = json_decode($data);
        $vendor = json_decode($data->vendor);
        $credit_days = (int) $data->credit_days;

    @endphp

    <section class="section-one">
        <div class="container">
            <div class="row one">

                <table width="100%" style="margin-bottom: 20px; font-size: 13px;">
                        <tr>
                            <td style="text-align: left;">
                                <img src="{{ asset('frontend/images/Logo.jpg' ) }}" style=" width: 108px;padding: 12px 0px;"
                                >
                            </td>
                            <td style="text-align: right;">
                                <strong>Date: </strong>{{ now()->format('d-m-Y') }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center">
                                <h3>Statement of Account As On {{ now()->format('d-m-Y') }}</h3>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div style="border-top: 3px solid #32354E;"></div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td style="text-align: left;">
                                Account Name: {{ $vendor->company_name }}
                            </td>
                            <td style="text-align: right;">
                                <strong>Terms of payment: </strong>{{$data->credit_days}} DAYS INV DATE<br>
                                <strong>Credit Limit: </strong>AED {{ $vendor->credit_limit }}
                            </td>
                        </tr>
                </table>

                <table width="100%" style="font-size: 13px;">
                    <thead>
                      <tr>
                        <th style="text-transform: capitalize;">#</th>
                        <th style="text-transform: capitalize;">Date</th>
                        <th style="text-transform: capitalize;">Lpo Number</th>
                        <th style="text-transform: capitalize;">Sales Order <br>Number</th>
                        <th style="text-transform: capitalize;">Vendor Invoice <br>Number</th>
                        <th style="text-transform: capitalize;">Vendor Invoice <br>Amount</th>
                        <th style="text-transform: capitalize;">Paid Amount</th>
                        <th style="text-transform: capitalize;">Balance Amount</th>
                        <th style="text-transform: capitalize;">Cum. Balance</th>
                        <th style="text-transform: capitalize;">Due Date</th>
                      </tr>
                    </thead>
                    <tbody>

                      @foreach ($data->lpos as $lpo)

                            @php
                                $lpo = json_decode($lpo);
                                if($data->vendor_type == "supplier"){
                                    $lpo = App\Models\SupplierLpo::find($lpo->id);
                                }else{
                                    $lpo = App\Models\InstallerLpo::find($lpo->id);
                                }


                                // dd($lpo);
                                $cum_balance = 0;
                            @endphp

                                
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $lpo->created_at->format('d-m-Y') }}</td>
                                <td>{{ $lpo->lpo_no }}</td>
                                <td>
                                  @if ($lpo->order)
                                    {{ $lpo->order->invoice_no }}
                                  @endif
                                </td>
                                <td>{{ $lpo->invoice }}</td>
                                <td>{{ $lpo->total }}</td>
                                <td>{{ $lpo->paid }}</td>
                                <td>{{ $lpo->total - $lpo->paid }}</td>
                                @php
                                  $cum_balance += $lpo->total - $lpo->paid;
                                @endphp
                                <td>{{ $cum_balance }}</td>
                                <td>{{ $lpo->created_at->addDays($credit_days)->format('d-m-Y') }}</td>
                            </tr>
                      @endforeach 

                    </tbody>
                    <tfoot class="thead-light tfoot">
                      <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Total Outstanding</th>
                        <th>{{ $cum_balance }}</th>
                        <th></th>
                      </tr>
                    </tfoot>
                </table>



                <table width="100%" style="padding-bottom: 30px;">
                    <tr class="three">
                    	
						<td align="left" style="vertical-align: top; padding-left: 10px;">
						    <br><br>
						    <style type="text/css">
						    	.email_template_body span, .email_template_body p{
						    		text-align: justify;
						    		font-size: 16px !important;
						    	}
						    </style>
						    <div class="email_template_body">
						    	
						    </div>

						</td>
                    </tr>
                </table>
            </div>  
        </div>
    </section>

  </body>
  {{-- @dd($data) --}}
</html>