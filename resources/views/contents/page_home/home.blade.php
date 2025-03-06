<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <link rel="icon" type="image/x-icon" href="{{ url('Trust_logo.png') }}">
    <title>Authentication Digital Transcript</title>
    <link type="text/css" rel="stylesheet" href="{{ asset('dist/css/tabler.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('dist/css/tabler-flags.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('dist/css/tabler-payments.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('dist/css/tabler-vendors.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('dist/css/demo.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('plugins/fontawesome/css/all.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('plugins/remixicon/remixicon.css') }}">
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
        --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      #card-body-top{
        padding: 40px 40px 20px 40px;
      }
      body {
        font-feature-settings: "cv03", "cv04", "cv11";
      }
      .img-logo{
        margin-bottom: 20px;
      }
    </style>
    <style>
      @media(max-width: 1080px){
        #score_table table {
          width: 80%;
          border-collapse: collapse;
          background: white;
        }
      }
      @media(min-width: 1081px){
        #score_table table {
          width: 50%;
          border-collapse: collapse;
          background: white;
        }
      }
    
      #score_table th,
      #score_table td {
        border: 1px solid #616161;
        padding: 4px;
        text-align: left;
      }
    
      #score_table th {
        background-color: #616161;
        color: white;
        text-align: center;
      }
    
      #score_table tr:nth-child(even) {
        background-color: #f2f2f2;
      }
      
      .score_container {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
      }
    </style>
  </head>
  <body >
    <div class="page">
      <div class="page-wrapper">
        <div class="page-body mb-0">
          <div class="container-xl">
            <div class="card card-lg">
              <img src="{{ asset('/static/Header_2.png') }}" alt="">
              <div class="card-body pt-3 pb-0">
                <div class="row">
                  <div class="col-12 text-center">
                    <p class="h1">
                      <strong>
                        Certificate of Achievement
                      </strong>
                    </p>
                    <p class="mb-0"><i>Awarded to:</i></p>
                    <p class="h2">
                      {{ $data['name'] }}
                    </p>
                    <p class="mb-0"><i>Issued Date:</i></p>
                    <p class="h3">
                      {{ $data['date_exam'] }}
                    </p>
                    <p class="mb-0"><i>Certificate No:</i></p>
                    <p class="h3">
                      {{ $data['number'] }}
                    </p>
                    <p class="mt-3 mb-0">
                      <i>
                        who has successfully achieved all the requirements of the following professional competency training and assesment titled: 
                      </i>
                    </p>
                    <p class="h1 mb-3">
                      Microsoft Office Desktop Application
                    </p>
                  </div>
                </div>
                <div class="row">
                  <span class="pt-1 pb-1 mb-3">
                    <p class="text-center m-0">
                      @if ($data['cst_type'] == 'GOLD_SILVER')
                        <i>
                          Graded:
                        </i>
                      @else
                        <i>
                          Subject Score:
                        </i>
                      @endif
                    </p>
                  </span>
                </div>
                <div class="row">
                  <div class="col-12 text-center score_container">
                    @if ($data['cst_type'] == 'GOLD_SILVER')
                      @if ($data['par_type'] == 'GOLD')
                        <div id="img-gold" class="mb-3">
                          <img src="{{ asset('static/Excelent - Gold.png') }}" alt="" style="max-height: 130px;">
                        </div>
                        <div>
                          <p class="h3"> Have completed the ACTION PROGRAM exam with an excellent grade</p>
                        </div>
                      @elseif ($data['par_type'] == 'SILVER')
                        <div id="img-gold" class="mb-3">
                          <img src="{{ asset('static/Good - Silver.png') }}" alt="" style="max-height: 130px;">
                        </div>
                        <div>
                          <p class="h3"> Have completed the ACTION PROGRAM exam with a good grade.</p>
                        </div>
                      @endif
                    @else
                      <table id="score_table" class="mb-3">
                        <tr>
                          <th style="min-width: 60px;">No</th>
                          <th style="min-width: 220px;">Subjects</th>
                          <th style="min-width: 90px;">Score</th>
                        </tr>
                        <tr>
                          <td style="text-align: center;">1</td>
                          <td>Microsoft Word</td>
                          <td style="text-align: center;">{{ $data['word'] }}</td>
                        </tr>
                        <tr>
                          <td style="text-align: center;">2</td>
                          <td>Microsoft Excel</td>
                          <td style="text-align: center;">{{ $data['excel'] }}</td>
                        </tr>
                        <tr>
                          <td style="text-align: center;">3</td>
                          <td>Microsoft Powerpoint</td>
                          <td style="text-align: center;">{{ $data['powerpoint'] }}</td>
                        </tr>
                      </table>
                    @endif
                  </div>
                </div>
              </div>
              <div class="card-body bg-dark-lt pt-3 pb-2">
                <table class="mb-2" style="border: none;">
                  <tr>
                    <td style="vertical-align: top;"><p class="mb-0"><i>Signed By:</i></p></td>
                    <td style="padding-left: 10px;"><p class="mb-0">MELVIN OET. Bcom MBA MCT</p><p class="mb-0">CHIEF INNOVATION OFFICER</p></td>
                  </tr>
                </table>
                <table class="mb-2" style="border: none;">
                  <tr>
                    <td style="vertical-align: top;"><p class="mb-0"><i>In Partnership with:</i></p></td>
                    <td style="padding-left: 10px;"><p class="mb-0"><strong>{{ $data['institution'] }}</strong> </p></td>
                  </tr>
                </table>
              </div>
              <img src="{{ asset('/static/footer_1.png') }}" alt="">
              <div  class="card-body pt-1 pb-1">
                <div class="row">
                  <div class="col-sm-12 text-center">
                    <p class="mb-0"><i>If feel that this information is not correct, please contact us at info@trustunified.com.</i></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <footer class="footer footer-transparent d-print-none">
          <div class="container-xl">
            <div class="row text-center align-items-center flex-row-reverse">
              <div class="col-12 col-lg-auto mt-0 mt-lg-0">
                <ul class="list-inline list-inline-dots m-0">
                  <li class="list-inline-item">
                    Copyright &copy; 2025
                    <a href="#" class="link-secondary">Trust Sistem Indonesia</a>
                  </li>
                  <li class="list-inline-item">
                    <a href="./changelog.html" class="link-secondary" rel="noopener">
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <script src="{{ asset('dist/libs/apexcharts/dist/apexcharts.min.js') }}" defer></script>
    <script src="{{ asset('dist/libs/jsvectormap/dist/js/jsvectormap.min.js') }}" defer></script>
    <script src="{{ asset('dist/libs/jsvectormap/dist/maps/world.js') }}" defer></script>
    <script src="{{ asset('dist/libs/jsvectormap/dist/maps/world-merc.js') }}" defer></script>
    <script src="{{ asset('plugins/jquery/jquery-3.6.3.min.js') }}"></script>
  </body>
</html>