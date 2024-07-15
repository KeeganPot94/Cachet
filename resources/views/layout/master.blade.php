<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="env" content="{{ app('env') }}">
    <meta name="token" content="{{ csrf_token() }}">

    <!-- Mobile friendliness -->
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="description"
        content="@yield('description', trans('cachet.meta.description.overview', ['app' => $appName]))">

    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('title', $siteTitle)">
    <meta property="og:image" content=" {{ asset('/img/favicon.png') }}">
    <meta property="og:description"
        content="@yield('description', trans('cachet.meta.description.overview', ['app' => $appName]))">

    <!-- Mobile IE allows us to activate ClearType technology for smoothing fonts for easy reading -->
    <meta http-equiv="cleartype" content="on">

    <meta name="msapplication-TileColor" content="{{ $themeGreens }}" />
    <meta name="msapplication-TileImage" content="{{ asset('/img/favicon.png') }}" />

    <link href="{{ Request::fullUrl() }}" rel="canonical">

    @if (isset($favicon))
    <link rel="icon" href="{{ asset(" /img/{$favicon}.ico") }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset(" /img/{$favicon}.png") }}" type="image/png">
    @else
    <link rel="icon" href="{{ asset('/img/favicon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('/img/favicon.png') }}" type="image/png">
    @endif

    <link rel="apple-touch-icon" href="{{ asset('/img/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('/img/apple-touch-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('/img/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('/img/apple-touch-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('/img/apple-touch-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('/img/apple-touch-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('/img/apple-touch-icon-152x152.png') }}">

    <title>@yield('title', $siteTitle)</title>

    @if($enableExternalDependencies)
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&amp;subset={{ $fontSubset }}"
        rel="stylesheet" type="text/css">
    @endif
    <link rel="stylesheet" href="{{ asset(mix('dist/css/app.css')) }} ">

    <!-- Links: DNS -->
    <link rel="stylesheet" href="{{ asset(mix('dist/css/dns.css')) }} ">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    <!-- End of Links: DNS -->

    <!-- Scripts: DNS -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!-- End of Scripts: DNS -->

    @include('partials.stylesheet')

    @include('partials.crowdin')

    @if($appStylesheet)
    <style type="text/css">
        {
             ! ! $appStylesheet  ! !
        }
    </style>
    @endif

    <script type="text/javascript">
        var Global = {};
        var refreshRate = parseInt("{{ $appRefreshRate }}");

        function refresh() {
            window.location.reload(true);
        }

        if (refreshRate > 0) {
            setTimeout(refresh, refreshRate * 1000);
        }

        Global.locale = '{{ $appLocale }}';
    </script>
    <script src="{{ asset(mix('dist/js/manifest.js')) }}"></script>
    <script src="{{ asset(mix('dist/js/vendor.js')) }}"></script>
</head>

<body class="status-page @yield('bodyClass')">
    @yield('outer-content')

    @include('partials.banner')

    <!-- Header: DNS -->
    <header class="header">
        <div class="container">
            <div class="col-con">
                <div class="col-left">
                    <img src="http://127.0.0.1:8000/img/DNS_Business_logo.png" alt="DNS logo" />
                </div>
                <div class="col-right">
                    <button class="btn-subscribe" id="btn-subscribe">
                        Subscribe
                        <span class="hidden-sm"> for updates</span>
                    </button>
                </div>
            </div>
        </div>
    </header>
    <!-- End of Header: DNS -->

    <div class="container" id="app">
        @yield('content')
    </div>

    <!-- Footer: DNS -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <ul class="list-inline">
                    <li>
                        <a class="btn btn-link" href="https://dns.business/" target="_blank"
                            rel="noopener noreferrer">DNS.Business</a>
                    </li>
                    <li>
                        <a class="btn btn-link" href="https://x.com/StatusDNS" target="_blank"
                            rel="noopener noreferrer">X</a>
                    </li>
                    <li>
                        <a class="btn btn-link" href="mailto:support@dns.business" target="_blank"
                            rel="noopener noreferrer">Support</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
    <!-- End of Footer: DNS -->
    <!-- Modal: DNS -->
    <dialog id="dialog">
        <div id="modal-sub-container" class="modal-sub-container">
            <div class="modal-sub-header">
                <h3 id="modal-h3">Subscribe to get updates</h3>
            </div>
            <div class="modal-sub-body">
                <div class="tabs">
                    <a href="#email-tab" data-target="email-tab" class="tabs-link active">Email</a>
                    <a href="#sms-tab" data-target="sms-tab" class="tabs-link">SMS</a>
                    <a href="#slack-tab" data-target="slack-tab" class="tabs-link">Slack</a>
                    <a href="#discord-tab" data-target="discord-tab" class="tabs-link">Discord</a>
                    <a href="#teams-tab" data-target="teams-tab" class="tabs-link">MS Teams</a>
                    <a href="#google-chat-tab" data-target="google-chat-tab" class="tabs-link">Google Chat</a>
                    <a href="#x-tab" data-target="x-tab" class="tabs-link">X</a>
                    <a href="#mattermost-tab" data-target="mattermost-tab" class="tabs-link">Mattermost</a>
                    <a href="#feed-tab" data-target="feed-tab" class="tabs-link">RSS</a>
                    <a href="#ical-tab" data-target="ical-tab" class="tabs-link">iCal Calendar</a>
                </div>
                <div class="tab-content">
                    <!-- EMAIL tab -->
                    <form action="{{ url('/subscribe') }}" id="email-tab" method="POST" class="tab-content">
                        @csrf
                        <input name="subscription[type]" type="hidden" value="email" />
                        <input name="subscription[locale]" type="hidden" value="en" />
                        <input autofocus="" id="email-tab_email" name="subscription[email]" placeholder="your@email.com"
                            type="email" required />
                        <div class="services-selection">
                            <div class="subscription-services-selector">
                                <div class="filter-toggle">
                                    <label>
                                        <input checked="" name="subscription[filter]" type="radio" value="all"
                                            id="radio-opt-all-1" />
                                        All
                                    </label>

                                    <label>
                                        <input name="subscription[filter]" type="radio" value="services"
                                            id="radio-opt-services-1" />
                                        Select services
                                    </label>
                                </div>
                                <div id="select-services-container-1" class="services-container" style="display: none">
                                    <label class="service service-level-1" data-service-id="#" data-page-id="#">
                                        <span class="with-icon"> Web Apps </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="prim-service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>

                                    <label class="service service-level-2" data-service-id="#" data-parent-id="#"
                                        data-page-id="#">
                                        <span class="with-icon">
                                            ZARC Portal (portal.registry.net.za)
                                        </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="sub-service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>

                                    <label class="service service-level-2" data-service-id="#" data-parent-id="#"
                                        data-page-id="#">
                                        <span class="with-icon">
                                            DNS Portal (portal.dns.business)
                                        </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="sub-service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>

                                    <label class="service service-level-2" data-service-id="#" data-parent-id="#"
                                        data-page-id="#">
                                        <span class="with-icon">
                                            RyCE Portal (portal.ryce-rsp.com)
                                        </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="sub-service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>

                                    <label class="service service-level-2" data-service-id="#" data-parent-id="#"
                                        data-page-id="#">
                                        <span class="with-icon">
                                            Registry Africa Portal (portal.registry.africa)
                                        </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="sub-service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>

                                    <label class="service service-level-1" data-service-id="#" data-page-id="#">
                                        <span class="with-icon"> TopDog Domain App </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>

                                    <label class="service service-level-1" data-service-id="#" data-page-id="#">
                                        <span class="with-icon"> Gateway API </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>

                                    <label class="service service-level-1" data-service-id="#" data-page-id="#">
                                        <span class="with-icon"> EPP </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- TO DO: configure CAPTCHA -->
                        <div class="g-recaptcha" data-sitekey="6LeQU_wpAAAAALmVSSEhUavy0rerF7BP-09pnPOt"></div>
                        <button type="submit">Subscribe</button>
                        <!-- TO DO: end -->
                    </form>
                    <!-- end of EMAIL tab -->

                    <!-- SMS tab -->
                    <form action="{{ url('/subscribe') }}" id="sms-tab" method="POST" class="tab-content">
                        @csrf
                        <input name="subscription[type]" type="hidden" value="sms" />
                        <input name="subscription[locale]" type="hidden" value="en" />

                        <!-- DROPDOWN: Country Code -->
                        <select class="js-country-dial-code-selector" id="sms-tab_country_dial_code"
                            name="subscription[country_dial_code]">
                            <option value="+972">Israel (+972)</option>
                            <option value="+93">Afghanistan (+93)</option>
                            <option value="+355">Albania (+355)</option>
                            <option value="+213">Algeria (+213)</option>
                            <option value="+1 684">AmericanSamoa (+1 684)</option>
                            <option value="+376">Andorra (+376)</option>
                            <option value="+244">Angola (+244)</option>
                            <option value="+1 264">Anguilla (+1 264)</option>
                            <option value="+1268">Antigua and Barbuda (+1268)</option>
                            <option value="+54">Argentina (+54)</option>
                            <option value="+374">Armenia (+374)</option>
                            <option value="+297">Aruba (+297)</option>
                            <option value="+61">Australia (+61)</option>
                            <option value="+43">Austria (+43)</option>
                            <option value="+994">Azerbaijan (+994)</option>
                            <option value="+1 242">Bahamas (+1 242)</option>
                            <option value="+973">Bahrain (+973)</option>
                            <option value="+880">Bangladesh (+880)</option>
                            <option value="+1 246">Barbados (+1 246)</option>
                            <option value="+375">Belarus (+375)</option>
                            <option value="+32">Belgium (+32)</option>
                            <option value="+501">Belize (+501)</option>
                            <option value="+229">Benin (+229)</option>
                            <option value="+1 441">Bermuda (+1 441)</option>
                            <option value="+975">Bhutan (+975)</option>
                            <option value="+387">Bosnia and Herzegovina (+387)</option>
                            <option value="+267">Botswana (+267)</option>
                            <option value="+55">Brazil (+55)</option>
                            <option value="+246">British Indian Ocean Territory (+246)</option>
                            <option value="+359">Bulgaria (+359)</option>
                            <option value="+226">Burkina Faso (+226)</option>
                            <option value="+257">Burundi (+257)</option>
                            <option value="+855">Cambodia (+855)</option>
                            <option value="+237">Cameroon (+237)</option>
                            <option value="+1">Canada (+1)</option>
                            <option value="+238">Cape Verde (+238)</option>
                            <option value="+ 345">Cayman Islands (+ 345)</option>
                            <option value="+236">Central African Republic (+236)</option>
                            <option value="+235">Chad (+235)</option>
                            <option value="+56">Chile (+56)</option>
                            <option value="+86">China (+86)</option>
                            <option value="+61">Christmas Island (+61)</option>
                            <option value="+57">Colombia (+57)</option>
                            <option value="+269">Comoros (+269)</option>
                            <option value="+242">Congo (+242)</option>
                            <option value="+682">Cook Islands (+682)</option>
                            <option value="+506">Costa Rica (+506)</option>
                            <option value="+385">Croatia (+385)</option>
                            <option value="+53">Cuba (+53)</option>
                            <option value="+537">Cyprus (+537)</option>
                            <option value="+420">Czech Republic (+420)</option>
                            <option value="+45">Denmark (+45)</option>
                            <option value="+253">Djibouti (+253)</option>
                            <option value="+1 767">Dominica (+1 767)</option>
                            <option value="+1 849">Dominican Republic (+1 849)</option>
                            <option value="+593">Ecuador (+593)</option>
                            <option value="+20">Egypt (+20)</option>
                            <option value="+503">El Salvador (+503)</option>
                            <option value="+240">Equatorial Guinea (+240)</option>
                            <option value="+291">Eritrea (+291)</option>
                            <option value="+372">Estonia (+372)</option>
                            <option value="+251">Ethiopia (+251)</option>
                            <option value="+298">Faroe Islands (+298)</option>
                            <option value="+679">Fiji (+679)</option>
                            <option value="+358">Finland (+358)</option>
                            <option value="+33">France (+33)</option>
                            <option value="+594">French Guiana (+594)</option>
                            <option value="+689">French Polynesia (+689)</option>
                            <option value="+241">Gabon (+241)</option>
                            <option value="+220">Gambia (+220)</option>
                            <option value="+995">Georgia (+995)</option>
                            <option value="+49">Germany (+49)</option>
                            <option value="+233">Ghana (+233)</option>
                            <option value="+350">Gibraltar (+350)</option>
                            <option value="+30">Greece (+30)</option>
                            <option value="+299">Greenland (+299)</option>
                            <option value="+1 473">Grenada (+1 473)</option>
                            <option value="+590">Guadeloupe (+590)</option>
                            <option value="+1 671">Guam (+1 671)</option>
                            <option value="+502">Guatemala (+502)</option>
                            <option value="+224">Guinea (+224)</option>
                            <option value="+245">Guinea-Bissau (+245)</option>
                            <option value="+595">Guyana (+595)</option>
                            <option value="+509">Haiti (+509)</option>
                            <option value="+504">Honduras (+504)</option>
                            <option value="+36">Hungary (+36)</option>
                            <option value="+354">Iceland (+354)</option>
                            <option value="+91">India (+91)</option>
                            <option value="+62">Indonesia (+62)</option>
                            <option value="+964">Iraq (+964)</option>
                            <option value="+353">Ireland (+353)</option>
                            <option value="+972">Israel (+972)</option>
                            <option value="+39">Italy (+39)</option>
                            <option value="+1 876">Jamaica (+1 876)</option>
                            <option value="+81">Japan (+81)</option>
                            <option value="+962">Jordan (+962)</option>
                            <option value="+7 7">Kazakhstan (+7 7)</option>
                            <option value="+254">Kenya (+254)</option>
                            <option value="+686">Kiribati (+686)</option>
                            <option value="+965">Kuwait (+965)</option>
                            <option value="+996">Kyrgyzstan (+996)</option>
                            <option value="+371">Latvia (+371)</option>
                            <option value="+961">Lebanon (+961)</option>
                            <option value="+266">Lesotho (+266)</option>
                            <option value="+231">Liberia (+231)</option>
                            <option value="+423">Liechtenstein (+423)</option>
                            <option value="+370">Lithuania (+370)</option>
                            <option value="+352">Luxembourg (+352)</option>
                            <option value="+261">Madagascar (+261)</option>
                            <option value="+265">Malawi (+265)</option>
                            <option value="+60">Malaysia (+60)</option>
                            <option value="+960">Maldives (+960)</option>
                            <option value="+223">Mali (+223)</option>
                            <option value="+356">Malta (+356)</option>
                            <option value="+692">Marshall Islands (+692)</option>
                            <option value="+596">Martinique (+596)</option>
                            <option value="+222">Mauritania (+222)</option>
                            <option value="+230">Mauritius (+230)</option>
                            <option value="+262">Mayotte (+262)</option>
                            <option value="+52">Mexico (+52)</option>
                            <option value="+377">Monaco (+377)</option>
                            <option value="+976">Mongolia (+976)</option>
                            <option value="+382">Montenegro (+382)</option>
                            <option value="+1664">Montserrat (+1664)</option>
                            <option value="+212">Morocco (+212)</option>
                            <option value="+95">Myanmar (+95)</option>
                            <option value="+264">Namibia (+264)</option>
                            <option value="+674">Nauru (+674)</option>
                            <option value="+977">Nepal (+977)</option>
                            <option value="+31">Netherlands (+31)</option>
                            <option value="+599">Netherlands Antilles (+599)</option>
                            <option value="+687">New Caledonia (+687)</option>
                            <option value="+64">New Zealand (+64)</option>
                            <option value="+505">Nicaragua (+505)</option>
                            <option value="+227">Niger (+227)</option>
                            <option value="+234">Nigeria (+234)</option>
                            <option value="+683">Niue (+683)</option>
                            <option value="+672">Norfolk Island (+672)</option>
                            <option value="+1 670">Northern Mariana Islands (+1 670)</option>
                            <option value="+47">Norway (+47)</option>
                            <option value="+968">Oman (+968)</option>
                            <option value="+92">Pakistan (+92)</option>
                            <option value="+680">Palau (+680)</option>
                            <option value="+507">Panama (+507)</option>
                            <option value="+675">Papua New Guinea (+675)</option>
                            <option value="+595">Paraguay (+595)</option>
                            <option value="+51">Peru (+51)</option>
                            <option value="+63">Philippines (+63)</option>
                            <option value="+48">Poland (+48)</option>
                            <option value="+351">Portugal (+351)</option>
                            <option value="+1 939">Puerto Rico (+1 939)</option>
                            <option value="+974">Qatar (+974)</option>
                            <option value="+40">Romania (+40)</option>
                            <option value="+250">Rwanda (+250)</option>
                            <option value="+685">Samoa (+685)</option>
                            <option value="+378">San Marino (+378)</option>
                            <option value="+966">Saudi Arabia (+966)</option>
                            <option value="+221">Senegal (+221)</option>
                            <option value="+381">Serbia (+381)</option>
                            <option value="+248">Seychelles (+248)</option>
                            <option value="+232">Sierra Leone (+232)</option>
                            <option value="+65">Singapore (+65)</option>
                            <option value="+421">Slovakia (+421)</option>
                            <option value="+386">Slovenia (+386)</option>
                            <option value="+677">Solomon Islands (+677)</option>
                            <option value="+27">South Africa (+27)</option>
                            <option value="+500">
                                South Georgia and the South Sandwich Islands (+500)
                            </option>
                            <option value="+34">Spain (+34)</option>
                            <option value="+94">Sri Lanka (+94)</option>
                            <option value="+249">Sudan (+249)</option>
                            <option value="+597">Suriname (+597)</option>
                            <option value="+268">Swaziland (+268)</option>
                            <option value="+46">Sweden (+46)</option>
                            <option value="+41">Switzerland (+41)</option>
                            <option value="+992">Tajikistan (+992)</option>
                            <option value="+66">Thailand (+66)</option>
                            <option value="+228">Togo (+228)</option>
                            <option value="+690">Tokelau (+690)</option>
                            <option value="+676">Tonga (+676)</option>
                            <option value="+1 868">Trinidad and Tobago (+1 868)</option>
                            <option value="+216">Tunisia (+216)</option>
                            <option value="+90">Turkey (+90)</option>
                            <option value="+993">Turkmenistan (+993)</option>
                            <option value="+1 649">Turks and Caicos Islands (+1 649)</option>
                            <option value="+688">Tuvalu (+688)</option>
                            <option value="+256">Uganda (+256)</option>
                            <option value="+380">Ukraine (+380)</option>
                            <option value="+971">United Arab Emirates (+971)</option>
                            <option value="+44">United Kingdom (+44)</option>
                            <option value="+1">United States (+1)</option>
                            <option value="+598">Uruguay (+598)</option>
                            <option value="+998">Uzbekistan (+998)</option>
                            <option value="+678">Vanuatu (+678)</option>
                            <option value="+681">Wallis and Futuna (+681)</option>
                            <option value="+967">Yemen (+967)</option>
                            <option value="+260">Zambia (+260)</option>
                            <option value="+263">Zimbabwe (+263)</option>
                            <option value="">land Islands ()</option>
                            <option value="null">Antarctica (null)</option>
                            <option value="+591">Bolivia, Plurinational State of (+591)</option>
                            <option value="+673">Brunei Darussalam (+673)</option>
                            <option value="+61">Cocos (Keeling) Islands (+61)</option>
                            <option value="+243">
                                Congo, The Democratic Republic of the (+243)
                            </option>
                            <option value="+225">Cote d'Ivoire (+225)</option>
                            <option value="+500">Falkland Islands (Malvinas) (+500)</option>
                            <option value="+44">Guernsey (+44)</option>
                            <option value="+379">Holy See (Vatican City State) (+379)</option>
                            <option value="+852">Hong Kong (+852)</option>
                            <option value="+98">Iran, Islamic Republic of (+98)</option>
                            <option value="+44">Isle of Man (+44)</option>
                            <option value="+44">Jersey (+44)</option>
                            <option value="+850">
                                Korea, Democratic People's Republic of (+850)
                            </option>
                            <option value="+82">Korea, Republic of (+82)</option>
                            <option value="+856">
                                Lao People's Democratic Republic (+856)
                            </option>
                            <option value="+218">Libyan Arab Jamahiriya (+218)</option>
                            <option value="+853">Macao (+853)</option>
                            <option value="+389">
                                Macedonia, The Former Yugoslav Republic of (+389)
                            </option>
                            <option value="+691">Micronesia, Federated States of (+691)</option>
                            <option value="+373">Moldova, Republic of (+373)</option>
                            <option value="+258">Mozambique (+258)</option>
                            <option value="+970">Palestinian Territory, Occupied (+970)</option>
                            <option value="+872">Pitcairn (+872)</option>
                            <option value="+262">Réunion (+262)</option>
                            <option value="+7">Russia (+7)</option>
                            <option value="+590">Saint Barthélemy (+590)</option>
                            <option value="+290">
                                Saint Helena, Ascension and Tristan Da Cunha (+290)
                            </option>
                            <option value="+1 869">Saint Kitts and Nevis (+1 869)</option>
                            <option value="+1 758">Saint Lucia (+1 758)</option>
                            <option value="+590">Saint Martin (+590)</option>
                            <option value="+508">Saint Pierre and Miquelon (+508)</option>
                            <option value="+1 784">
                                Saint Vincent and the Grenadines (+1 784)
                            </option>
                            <option value="+239">Sao Tome and Principe (+239)</option>
                            <option value="+252">Somalia (+252)</option>
                            <option value="+47">Svalbard and Jan Mayen (+47)</option>
                            <option value="+963">Syrian Arab Republic (+963)</option>
                            <option value="+886">Taiwan, Province of China (+886)</option>
                            <option value="+255">Tanzania, United Republic of (+255)</option>
                            <option value="+670">Timor-Leste (+670)</option>
                            <option value="+58">Venezuela, Bolivarian Republic of (+58)</option>
                            <option value="+84">Viet Nam (+84)</option>
                            <option value="+1 284">Virgin Islands, British (+1 284)</option>
                            <option value="+1 340">Virgin Islands, U.S. (+1 340)</option>
                        </select>

                        <!-- INPUT: phone number -->
                        <input autofocus="" id="sms-tab_phone_number" name="subscription[phone_number]"
                            placeholder="Your phone number" required="" type="tel" />

                        <div class="services-selection">
                            <div class="subscription-services-selector">
                                <div class="filter-toggle">
                                    <label>
                                        <input checked="" name="subscription[filter]" type="radio" value="all"
                                            id="radio-opt-all-2" />
                                        All
                                    </label>

                                    <label>
                                        <input name="subscription[filter]" type="radio" value="services"
                                            id="radio-opt-services-2" />
                                        Select services
                                    </label>
                                </div>
                                <div id="select-services-container-2" class="services-container" style="display: none">
                                    <label class="service service-level-1" data-service-id="#" data-page-id="#">
                                        <span class="with-icon"> Web Apps </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="prim-service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>

                                    <label class="service service-level-2" data-service-id="#" data-parent-id="#"
                                        data-page-id="#">
                                        <span class="with-icon">
                                            ZARC Portal (portal.registry.net.za)
                                        </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="sub-service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>

                                    <label class="service service-level-2" data-service-id="#" data-parent-id="#"
                                        data-page-id="#">
                                        <span class="with-icon">
                                            DNS Portal (portal.dns.business)
                                        </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="sub-service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>

                                    <label class="service service-level-2" data-service-id="#" data-parent-id="#"
                                        data-page-id="#">
                                        <span class="with-icon">
                                            RyCE Portal (portal.ryce-rsp.com)
                                        </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="sub-service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>

                                    <label class="service service-level-2" data-service-id="#" data-parent-id="#"
                                        data-page-id="#">
                                        <span class="with-icon">
                                            Registry Africa Portal (portal.registry.africa)
                                        </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="sub-service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>

                                    <label class="service service-level-1" data-service-id="#" data-page-id="#">
                                        <span class="with-icon"> TopDog Domain App </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>

                                    <label class="service service-level-1" data-service-id="#" data-page-id="#">
                                        <span class="with-icon"> Gateway API </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>

                                    <label class="service service-level-1" data-service-id="#" data-page-id="#">
                                        <span class="with-icon"> EPP </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- TO DO: configure CAPTCHA -->
                        <div class="g-recaptcha" data-sitekey="6LeQU_wpAAAAALmVSSEhUavy0rerF7BP-09pnPOt"></div>
                        <button type="submit">Subscribe</button>
                        <!-- TO DO: end -->
                    </form>
                    <!-- end of SMS tab -->

                    <!-- SLACK tab -->
                    <div class="tab-content" id="slack-tab">
                        <a href="#">
                            <img alt="Add to Slack" height="40" width="139"
                                src="http://127.0.0.1:8000/img/add_to_slack.png" />
                        </a>
                    </div>
                    <!-- end of SLACK tab -->
                    <!-- DISCORD tab -->
                    <form action="{{ url('/subscribe') }}" id="discord-tab" method="POST" class="tab-content">
                        @csrf
                        <input name="subscription[type]" type="hidden" value="discord" />
                        <input name="subscription[locale]" type="hidden" value="en" />

                        <div class="control-label">
                            Webhook URL (<a
                                href="https://support.discord.com/hc/en-us/articles/228383668-Intro-to-Webhooks"
                                target="_blank">help</a>)
                        </div>
                        <input autofocus="" id="discord-tab_webhook_url" name="subscription[webhook_url]"
                            placeholder="https://discordapp.com/api/webhooks/channelId/token" required="" type="url" />

                        <div class="services-selection">
                            <div class="subscription-services-selector">
                                <div class="filter-toggle">
                                    <label>
                                        <input checked="" name="subscription[filter]" type="radio" value="all"
                                            id="radio-opt-all-3" />
                                        All
                                    </label>

                                    <label>
                                        <input name="subscription[filter]" type="radio" value="services"
                                            id="radio-opt-services-3" />
                                        Select services
                                    </label>
                                </div>
                                <div id="select-services-container-3" class="services-container" style="display: none">
                                    <label class="service service-level-1" data-service-id="#" data-page-id="#">
                                        <span class="with-icon"> Web Apps </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="prim-service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>

                                    <label class="service service-level-2" data-service-id="#" data-parent-id="#"
                                        data-page-id="#">
                                        <span class="with-icon">
                                            ZARC Portal (portal.registry.net.za)
                                        </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="sub-service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>

                                    <label class="service service-level-2" data-service-id="#" data-parent-id="#"
                                        data-page-id="#">
                                        <span class="with-icon">
                                            DNS Portal (portal.dns.business)
                                        </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="sub-service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>

                                    <label class="service service-level-2" data-service-id="#" data-parent-id="#"
                                        data-page-id="#">
                                        <span class="with-icon">
                                            RyCE Portal (portal.ryce-rsp.com)
                                        </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="sub-service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>

                                    <label class="service service-level-2" data-service-id="#" data-parent-id="#"
                                        data-page-id="#">
                                        <span class="with-icon">
                                            Registry Africa Portal (portal.registry.africa)
                                        </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="sub-service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>

                                    <label class="service service-level-1" data-service-id="#" data-page-id="#">
                                        <span class="with-icon"> TopDog Domain App </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>

                                    <label class="service service-level-1" data-service-id="#" data-page-id="#">
                                        <span class="with-icon"> Gateway API </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>

                                    <label class="service service-level-1" data-service-id="#" data-page-id="#">
                                        <span class="with-icon"> EPP </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- TO DO: configure CAPTCHA -->
                        <div class="g-recaptcha" data-sitekey="6LeQU_wpAAAAALmVSSEhUavy0rerF7BP-09pnPOt"></div>
                        <button type="submit">Subscribe</button>
                        <!-- TO DO: end -->
                    </form>
                    <!-- end of DISCORD tab -->

                    <!-- TEAMS tab -->
                    <form action="{{ url('//subscribe') }}" id="teams-tab" method="POST" class="tab-content">
                        @csrf
                        <input name="subscription[type]" type="hidden" value="teams" />
                        <input name="subscription[locale]" type="hidden" value="en" />

                        <div class="control-label">
                            Webhook URL (<a
                                href="https://learn.microsoft.com/en-us/microsoftteams/platform/webhooks-and-connectors/how-to/add-incoming-webhook?tabs=newteams%2Cdotnet"
                                target="_blank">help</a>)
                        </div>
                        <input autofocus="" id="teams-tab_teams_webhook_url" name="subscription[teams_webhook_url]"
                            placeholder="https://yourdomain.webhook.office.com/webhookb2/token" required=""
                            type="url" />

                        <div class="services-selection">
                            <div class="subscription-services-selector">
                                <div class="filter-toggle">
                                    <label>
                                        <input checked="" name="subscription[filter]" type="radio" value="all"
                                            id="radio-opt-all-4" />
                                        All
                                    </label>

                                    <label>
                                        <input name="subscription[filter]" type="radio" value="services"
                                            id="radio-opt-services-4" />
                                        Select services
                                    </label>
                                </div>
                                <div id="select-services-container-4" class="services-container" style="display: none">
                                    <label class="service service-level-1" data-service-id="#" data-page-id="#">
                                        <span class="with-icon"> Web Apps </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="prim-service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>

                                    <label class="service service-level-2" data-service-id="#" data-parent-id="#"
                                        data-page-id="#">
                                        <span class="with-icon">
                                            ZARC Portal (portal.registry.net.za)
                                        </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="sub-service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>

                                    <label class="service service-level-2" data-service-id="#" data-parent-id="#"
                                        data-page-id="#">
                                        <span class="with-icon">
                                            DNS Portal (portal.dns.business)
                                        </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="sub-service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>

                                    <label class="service service-level-2" data-service-id="#" data-parent-id="#"
                                        data-page-id="#">
                                        <span class="with-icon">
                                            RyCE Portal (portal.ryce-rsp.com)
                                        </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="sub-service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>

                                    <label class="service service-level-2" data-service-id="#" data-parent-id="#"
                                        data-page-id="#">
                                        <span class="with-icon">
                                            Registry Africa Portal (portal.registry.africa)
                                        </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="sub-service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>

                                    <label class="service service-level-1" data-service-id="#" data-page-id="#">
                                        <span class="with-icon"> TopDog Domain App </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>

                                    <label class="service service-level-1" data-service-id="#" data-page-id="#">
                                        <span class="with-icon"> Gateway API </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>

                                    <label class="service service-level-1" data-service-id="#" data-page-id="#">
                                        <span class="with-icon"> EPP </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- TO DO: configure CAPTCHA -->
                        <div class="g-recaptcha" data-sitekey="6LeQU_wpAAAAALmVSSEhUavy0rerF7BP-09pnPOt"></div>
                        <button type="submit">Subscribe</button>
                        <!-- TO DO: end -->
                    </form>
                    <!-- end of TEAMS tab -->

                    <!-- GOOGLE CHAT tab -->
                    <form action="{{ url('/subscribe') }}" id="google-chat-tab" method="POST" class="tab-content">
                        @csrf
                        <input name="subscription[type]" type="hidden" value="google_chat" />
                        <input name="subscription[locale]" type="hidden" value="en" />

                        <div class="control-label">
                            Webhook URL (<a
                                href="https://developers.google.com/chat/how-tos/webhooks#setting_up_an_incoming_webhook"
                                target="_blank">help</a>)
                        </div>
                        <input autofocus="" id="google-chat-tab_google_chat_webhook_url"
                            name="subscription[google_chat_webhook_url]"
                            placeholder="https://chat.googleapis.com/v1/spaces/space_id/messages?key=key&amp;token=token"
                            required="" type="url" />

                        <div class="services-selection">
                            <div class="subscription-services-selector">
                                <div class="filter-toggle">
                                    <label>
                                        <input checked="" name="subscription[filter]" type="radio" value="all"
                                            id="radio-opt-all-5" />
                                        All
                                    </label>

                                    <label>
                                        <input name="subscription[filter]" type="radio" value="services"
                                            id="radio-opt-services-5" />
                                        Select services
                                    </label>
                                </div>
                                <div id="select-services-container-5" class="services-container" style="display: none">
                                    <label class="service service-level-1" data-service-id="#" data-page-id="#">
                                        <span class="with-icon"> Web Apps </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="prim-service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>

                                    <label class="service service-level-2" data-service-id="#" data-parent-id="#"
                                        data-page-id="#">
                                        <span class="with-icon">
                                            ZARC Portal (portal.registry.net.za)
                                        </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="sub-service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>

                                    <label class="service service-level-2" data-service-id="#" data-parent-id="#"
                                        data-page-id="#">
                                        <span class="with-icon">
                                            DNS Portal (portal.dns.business)
                                        </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="sub-service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>

                                    <label class="service service-level-2" data-service-id="#" data-parent-id="#"
                                        data-page-id="#">
                                        <span class="with-icon">
                                            RyCE Portal (portal.ryce-rsp.com)
                                        </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="sub-service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>

                                    <label class="service service-level-2" data-service-id="#" data-parent-id="#"
                                        data-page-id="#">
                                        <span class="with-icon">
                                            Registry Africa Portal (portal.registry.africa)
                                        </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="sub-service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>

                                    <label class="service service-level-1" data-service-id="#" data-page-id="#">
                                        <span class="with-icon"> TopDog Domain App </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>

                                    <label class="service service-level-1" data-service-id="#" data-page-id="#">
                                        <span class="with-icon"> Gateway API </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>

                                    <label class="service service-level-1" data-service-id="#" data-page-id="#">
                                        <span class="with-icon"> EPP </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- TO DO: configure CAPTCHA -->
                        <div class="g-recaptcha" data-sitekey="6LeQU_wpAAAAALmVSSEhUavy0rerF7BP-09pnPOt"></div>
                        <button type="submit">Subscribe</button>
                        <!-- TO DO: end -->
                    </form>
                    <!-- end of GOOGLE CHAT tab -->

                    <!-- MATTERMOST tab -->
                    <form action="{{ url('/subscribe') }}" id="mattermost-tab" method="POST" class="tab-content">
                        @csrf
                        <input name="subscription[type]" type="hidden" value="mattermost" />
                        <input name="subscription[locale]" type="hidden" value="en" />

                        <div class="control-label">
                            Webhook URL (<a href="https://developers.mattermost.com/integrate/webhooks/incoming/"
                                target="_blank">help</a>)
                        </div>
                        <input autofocus="" id="mattermost-tab_mattermost_webhook_url"
                            name="subscription[mattermost_webhook_url]"
                            placeholder="https://yourdomain.cloud.mattermost.com/hooks/api_key" required=""
                            type="url" />

                        <div class="services-selection">
                            <div class="subscription-services-selector">
                                <div class="filter-toggle">
                                    <label>
                                        <input checked="" name="subscription[filter]" type="radio" value="all"
                                            id="radio-opt-all-6" />
                                        All
                                    </label>

                                    <label>
                                        <input name="subscription[filter]" type="radio" value="services"
                                            id="radio-opt-services-6" />
                                        Select services
                                    </label>
                                </div>
                                <div id="select-services-container-6" class="services-container" style="display: none">
                                    <label class="service service-level-1" data-service-id="#" data-page-id="#">
                                        <span class="with-icon"> Web Apps </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="prim-service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>

                                    <label class="service service-level-2" data-service-id="#" data-parent-id="#"
                                        data-page-id="#">
                                        <span class="with-icon">
                                            ZARC Portal (portal.registry.net.za)
                                        </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="sub-service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>

                                    <label class="service service-level-2" data-service-id="#" data-parent-id="#"
                                        data-page-id="#">
                                        <span class="with-icon">
                                            DNS Portal (portal.dns.business)
                                        </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="sub-service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>

                                    <label class="service service-level-2" data-service-id="#" data-parent-id="#"
                                        data-page-id="#">
                                        <span class="with-icon">
                                            RyCE Portal (portal.ryce-rsp.com)
                                        </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="sub-service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>

                                    <label class="service service-level-2" data-service-id="#" data-parent-id="#"
                                        data-page-id="#">
                                        <span class="with-icon">
                                            Registry Africa Portal (portal.registry.africa)
                                        </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="sub-service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>

                                    <label class="service service-level-1" data-service-id="#" data-page-id="#">
                                        <span class="with-icon"> TopDog Domain App </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>

                                    <label class="service service-level-1" data-service-id="#" data-page-id="#">
                                        <span class="with-icon"> Gateway API </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>

                                    <label class="service service-level-1" data-service-id="#" data-page-id="#">
                                        <span class="with-icon"> EPP </span>

                                        <input name="subscription[service_ids][#]" type="hidden" value="false" /><input
                                            autocomplete="off" class="service-checkbox" data-service-id="#"
                                            name="subscription[service_ids][#]" type="checkbox" value="true" />
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- TO DO: configure CAPTCHA -->
                        <div class="g-recaptcha" data-sitekey="6LeQU_wpAAAAALmVSSEhUavy0rerF7BP-09pnPOt"></div>
                        <button type="submit">Subscribe</button>
                        <!-- TO DO: end -->
                    </form>
                    <!-- end of MATTERMOST tab -->

                    <!-- X tab -->
                    <div class="tab-content" id="x-tab">
                        Follow our updates on X:
                        <b>
                            <a href="//twitter.com/StatusDNS" target="_blank">@StatusDNS</a>
                        </b>
                    </div>
                    <!-- end of X tab -->

                    <!-- RSS tab -->
                    <div class="feed-links" id="feed-tab">
                        <a href="https://status.dns.business/history.atom" target="_blank">Atom feed</a>
                        or
                        <a href="https://status.dns.business/history.rss" target="_blank">RSS feed</a>
                    </div>
                    <!-- end of RSS tab -->

                    <!-- iCAL tab -->
                    <div class="ical-links" id="ical-tab">
                        <a href="webcal://status.dns.business/calendar/maintenance/feed.ics" target="_blank">Only
                            maintenance events</a>
                        or
                        <a href="webcal://status.dns.business/calendar/all/feed.ics" target="_blank">All</a>
                    </div>
                    <!-- end of iCAL tab -->
                </div>
            </div>
        </div>
    </dialog>
    <!-- End of Modal: DNS -->
    <!-- Scripts: DNS -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
          // Define an array of control sets
          var controlSets = [
            {
              showRadioId: "radio-opt-services-1",
              hideRadioId: "radio-opt-all-1",
              targetElementId: "select-services-container-1",
            },
            {
              showRadioId: "radio-opt-services-2",
              hideRadioId: "radio-opt-all-2",
              targetElementId: "select-services-container-2",
            },
            {
              showRadioId: "radio-opt-services-3",
              hideRadioId: "radio-opt-all-3",
              targetElementId: "select-services-container-3",
            },
            {
              showRadioId: "radio-opt-services-4",
              hideRadioId: "radio-opt-all-4",
              targetElementId: "select-services-container-4",
            },
            {
              showRadioId: "radio-opt-services-5",
              hideRadioId: "radio-opt-all-5",
              targetElementId: "select-services-container-5",
            },
            {
              showRadioId: "radio-opt-services-6",
              hideRadioId: "radio-opt-all-6",
              targetElementId: "select-services-container-6",
            },
          ];
      
          // Loop through each control set
          controlSets.forEach(function (controlSet) {
            var showRadio = document.getElementById(controlSet.showRadioId);
            var hideRadio = document.getElementById(controlSet.hideRadioId);
            var targetElement = document.getElementById(controlSet.targetElementId);
      
            // Event listener to show target element
            showRadio.addEventListener("click", function () {
              targetElement.style.display = "block";
            });
      
            // Event listener to hide target element
            hideRadio.addEventListener("click", function () {
              targetElement.style.display = "none";
            });
          });
      
          const tabLinks = document.querySelectorAll(".tabs-link");
      
          tabLinks.forEach((tabLink) => {
            tabLink.addEventListener("click", () => {
              document.querySelector(".active")?.classList.remove("active");
              tabLink.classList.add("active");
            });
          });
      
          const dialog = document.getElementById("dialog");
          const showButton = document.getElementById("btn-subscribe");
      
          // "Subsrcibe" button opens the dialog modally
          showButton.addEventListener("click", () => {
            dialog.showModal();
          });
      
          // Close dialog by clicking outside modal
          dialog.addEventListener("click", (event) => {
            if (event.target == dialog) {
              dialog.close();
            }
          });
      
          var checkboxes = document.querySelectorAll(
            "input.sub-service-checkbox[type='checkbox']"
          );
      
          function checkAll(parentCheckbox) {
            if (parentCheckbox.checked) {
              checkboxes.forEach(function (checkbox) {
                checkbox.checked = true;
              });
            } else {
              checkboxes.forEach(function (checkbox) {
                checkbox.checked = false;
              });
            }
          }
      
          var serviceCheckboxes = document.querySelectorAll(
            "input.prim-service-checkbox[type='checkbox']"
          );
          serviceCheckboxes.forEach(function (checkbox) {
            checkbox.addEventListener("change", function () {
              checkAll(checkbox);
            });
          });
        });
    </script>
    <!-- End of Scripts: DNS -->
</body>

</html>