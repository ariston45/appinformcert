<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
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
        table {
          width: 80%;
          border-collapse: collapse;
          background: white;
        }
      }
      @media(min-width: 1081px){
        table {
          width: 50%;
          border-collapse: collapse;
          background: white;
        }
      }
    
      th,
      td {
        border: 1px solid #ddd;
        padding: 4px;
        text-align: left;
      }
    
      th {
        background-color: #616161;
        color: white;
        text-align: center;
      }
    
      tr:nth-child(even) {
        background-color: #f2f2f2;
      }
    
      tr:hover {
        background-color: #ddd;
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
        {{-- <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <h2 class="page-title">
                  Trust System Indonesia
                </h2>
              </div>
              <div class="col-auto ms-auto d-print-none">
                
              </div>
            </div>
          </div>
        </div> --}}
        <div class="page-body mb-0">
          <div class="container-xl">
            <div class="card card-lg">
              <div class="card-body bg-blue" id="card-body-top">
                <div class="row">
                  <div class="col-sm-6 img-logo">
                    <img src="{{ asset('/static/trust_logo.png') }}" alt="" style=" max-width: 300px;">
                  </div>
                  <div class="col-sm-6 text-end img-logo">
                    <img src="{{ asset('/static/ms_partner.png') }}" alt="" style=" max-width: 300px;">
                  </div>
                </div>
              </div>
              <div class="card-body pt-3">
                <div class="row">
                  <div class="col-12 text-center">
                    <p class="h1">
                      <strong>
                        Authenticated Digital Transcript of Certification
                      </strong>
                    </p>
                    <p class="h3">
                      {{ $data['date_exam'] }}
                    </p>
                    <p class="h2">
                      {{ $data['name'] }}
                    </p>
                    <p class="h3">
                      {{ $data['institution'] }}
                    </p>
                    <p>
                      <i>
                        This real-time Action Program Digital Transcript is derived from a global database which and authenticates certification exams administered by Trust Training Partner.
                      </i>
                    </p>
                  </div>
                </div>
                <div class="row">
                  <span class="bg-blue pt-1 pb-1 mb-3">
                    <p class="h2 text-center m-0 text-light">
                      @if ($data['par_type'] == 'GOLD' || $data['par_type'] == 'SILVER')
                        Graded
                      @else
                        Score Transcript
                      @endif
                    </p>
                  </span>
                </div>
                <div class="row">
                  <div class="col-12 text-center score_container">
                    @if ($data['cst_type'] == 'GOLD_SILVER')
                      @if ($data['par_type'] == 'GOLD')
                        <div id="img-gold" class="mb-3">
                          <img src="{{ asset('static/Excelent - Gold.png') }}" alt="" style="max-height: 150px;">
                        </div>
                        <div>
                          <p class="h3"> Have completed the ACTION PROGRAM exam with an excellent grade</p>
                        </div>
                      @elseif ($data['par_type'] == 'SILVER')
                        <div id="img-gold" class="mb-3">
                          <img src="{{ asset('static/Good - Silver.png') }}" alt="" style="max-height: 150px;">
                        </div>
                        <div>
                          <p class="h3"> Have completed the ACTION PROGRAM exam with a good grade</p>
                        </div>
                      @endif
                    @else
                      <table>
                        <tr>
                          <th>No</th>
                          <th>Subjects</th>
                          <th>Score</th>
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