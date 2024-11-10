@extends('dashboard.layout.app')
@section('content')

    <div class="main-container container-fluid">
        <div class="inner-body">
            <div id="mobileshow" class="see"></div>
            <div class="sees hide-mobile"></div>
            <!--Row-->
            <div class="row row-sm">
                <div class="col-sm-12 col-lg-12 col-xl-12 col-xxl-12">

                    <div class="row row-sm">
                        <div class="col-xl-5">
                            <!-- div -->
                            <div class="card custom-card" id="tabs-style43">
                                <div class="card-body p-0 border p-0 rounded-10">

                                    <div class="p-4">
                                        <h4 class="tx-15 text-uppercase mb-3">Biodata</h4>
                                        <div class="d-sm-flex">
                                            <div class="mg-sm-r-20 mg-b-10">
                                                <div class="main-profile-contact-list">
                                                    <div class="media">
                                                        <div class="media-icon bg-primary-transparent text-info"> <i class="fa fa-users"></i> </div>
                                                        <div class="media-body"> <span>FullName</span>
                                                            <div> {{ $user->fullname() }}  </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mg-sm-r-20 mg-b-10">
                                                <div class="main-profile-contact-list">
                                                    <div class="media">
                                                        <div class="media-icon bg-info-transparent text-info"> <i class="icon fa fa-bookmark"></i> </div>
                                                        <div class="media-body"> <span>Username</span>
                                                            <div> {{ $user->username }} </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="">
                                                <div class="main-profile-contact-list">
                                                    <div class="media">
                                                        <div class="media-icon bg-info-transparent text-info"> <i class="icon fa fa-envelope"></i> </div>
                                                        <div class="media-body"> <span>Email</span>
                                                            <div> <a href="" class="__cf_email__">{{ $user->email }}</a> </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-top"></div>
                                    <div class="p-4">
                                        <label class="main-content-label tx-13 mg-b-20">Others</label>
                                        <div class="d-sm-flex">
                                            <div class="profile-about-social">
                                                <div class="main-profile-social-list mg-sm-r-20 mg-b-10">
                                                    <div class="media">
                                                        <div class="media-icon bg-info-transparent text-info"> <i class="icon fa fa-phone"></i> </div>
                                                        <div class="media-body"> <span>Phone</span> <a href="javascript:;">{{ $user->phone }}</a> </div>
                                                    </div>
                                                </div>
                                                <div class="main-profile-social-list mg-sm-r-20 mg-b-10">
                                                    <div class="media">
                                                        <div class="media-icon bg-info-transparent text-info"> <i class="icon fa fa-genderless"></i> </div>
                                                        <div class="media-body"> <span>Gender</span> <a href="javascript:;">Female</a> </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="profile-about-social">
                                                <div class="main-profile-social-list mg-sm-r-20 mg-b-10">
                                                    <div class="media">
                                                        <div class="media-icon bg-info-transparent text-info"> <i class="icon fa fa-compass"></i> </div>
                                                        <div class="media-body"> <span>Country</span> <a href="javascript:;">{{ $user->country }}</a> </div>
                                                    </div>
                                                </div>
                                                <hr>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-7">
                            <!-- div -->
                            <div class="card custom-card" id="tabs-style43">
                                <div class="card-body">
                                    <div class="main-content-label mg-b-5">
                                        Account Settings
                                    </div>
                                    <div class="text-wrap">
                                        <div class="example">
                                            <div class="d-md-flex">
                                                <div class="">
                                                    <div class="panel panel-primary tabs-style-4">
                                                        <div class="tab-menu-heading">
                                                            <div class="tabs-menu ">
                                                                <!-- Tabs -->
                                                                <ul class="nav panel-tabs me-3">
                                                                    <li class=""><a href="#tab21" class="active" data-bs-toggle="tab"> Account Details</a></li>
                                                                    <li><a href="#tab22" data-bs-toggle="tab" class=""> Change Password</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tabs-style-4 ">
                                                    <div class="panel-body tabs-menu-body">
                                                        <div class="tab-content">
                                                            <div class="tab-pane active" id="tab21">
                                                                <form class="form-horizontal" method="POST" action="{{ route('user.updateProfile', $user->id) }}">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    @if(session()->has('success'))
                                                                        <div class="alert alert-success">
                                                                            {{ session()->get('success') }}
                                                                        </div>
                                                                    @endif
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6 mb-1 mt-2">
                                                                            <div><label class="label-block">First Name</label></div>
                                                                            <input type="text" name="firstname" value="{{ old('firstname', optional($user)->firstname) }}" class="form-control" required="">
                                                                        </div>
                                                                        <div class="form-group col-md-6 mb-1 mt-2">
                                                                            <div><label class="label-block">Last Name</label></div>
                                                                            <input type="text" name="lastname" value="{{ old('lastname', optional($user)->lastname) }}" class="form-control" required="">
                                                                        </div>
                                                                        <div class="form-group col-md-12 mt-1">
                                                                            <div><label class="label-block">Country</label></div>
                                                                            <select class="form-control select2" name="country">
                                                                                <option label="Select Country">
                                                                                </option>
                                                                                <option value="Afghanistan">Afghanistan</option>
                                                                                <option value="Akrotiri">Akrotiri</option>
                                                                                <option value="Albania">Albania</option>
                                                                                <option value="Algeria">Algeria</option>
                                                                                <option value="American Samoa">American Samoa</option>
                                                                                <option value="Andorra">Andorra</option>
                                                                                <option value="Angola">Angola</option>
                                                                                <option value="Anguilla">Anguilla</option>
                                                                                <option value="Antarctica">Antarctica</option>
                                                                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                                                <option value="Argentina">Argentina</option>
                                                                                <option value="Armenia">Armenia</option>
                                                                                <option value="Aruba">Aruba</option>
                                                                                <option value="Ashmore and Cartier Is.">Ashmore and Cartier Is.</option>
                                                                                <option value="Australia">Australia</option>
                                                                                <option value="Austria">Austria</option>
                                                                                <option value="Azerbaijan">Azerbaijan</option>
                                                                                <option value="Bahamas">Bahamas</option>
                                                                                <option value="Bahrain">Bahrain</option>
                                                                                <option value="Baikonur">Baikonur</option>
                                                                                <option value="Bajo Nuevo Bank">Bajo Nuevo Bank</option>
                                                                                <option value="Bangladesh">Bangladesh</option>
                                                                                <option value="Barbados">Barbados</option>
                                                                                <option value="Belarus">Belarus</option>
                                                                                <option value="Belgium">Belgium</option>
                                                                                <option value="Belize">Belize</option>
                                                                                <option value="Benin">Benin</option>
                                                                                <option value="Bermuda">Bermuda</option>
                                                                                <option value="Bhutan">Bhutan</option>
                                                                                <option value="Bolivia">Bolivia</option>
                                                                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                                                <option value="Botswana">Botswana</option>
                                                                                <option value="Bouvet Island">Bouvet Island</option>
                                                                                <option value="Brazil">Brazil</option>
                                                                                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                                                <option value="British Virgin Islands">British Virgin Islands</option>
                                                                                <option value="Brunei">Brunei</option>
                                                                                <option value="Bulgaria">Bulgaria</option>
                                                                                <option value="Burkina Faso">Burkina Faso</option>
                                                                                <option value="Burundi">Burundi</option>
                                                                                <option value="Cambodia">Cambodia</option>
                                                                                <option value="Cameroon">Cameroon</option>
                                                                                <option value="Canada">Canada</option>
                                                                                <option value="Cape Verde">Cape Verde</option>
                                                                                <option value="Caribbean Netherlands">Caribbean Netherlands</option>
                                                                                <option value="Cayman Islands">Cayman Islands</option>
                                                                                <option value="Central African Republic">Central African Republic</option>
                                                                                <option value="Chad">Chad</option>
                                                                                <option value="Chile">Chile</option>
                                                                                <option value="China">China</option>
                                                                                <option value="Christmas Island">Christmas Island</option>
                                                                                <option value="Clipperton I.">Clipperton I.</option>
                                                                                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                                                <option value="Colombia">Colombia</option>
                                                                                <option value="Comoros">Comoros</option>
                                                                                <option value="Cook Islands">Cook Islands</option>
                                                                                <option value="Coral Sea Is.">Coral Sea Is.</option>
                                                                                <option value="Costa Rica">Costa Rica</option>
                                                                                <option value="Croatia">Croatia</option>
                                                                                <option value="Cuba">Cuba</option>
                                                                                <option value="Curaçao">Curaçao</option>
                                                                                <option value="Cyprus">Cyprus</option>
                                                                                <option value="Cyprus U.N. Buffer Zone">Cyprus U.N. Buffer Zone</option>
                                                                                <option value="Czechia">Czechia</option>
                                                                                <option value="DR Congo">DR Congo</option>
                                                                                <option value="Denmark">Denmark</option>
                                                                                <option value="Dhekelia">Dhekelia</option>
                                                                                <option value="Djibouti">Djibouti</option>
                                                                                <option value="Dominica">Dominica</option>
                                                                                <option value="Dominican Republic">Dominican Republic</option>
                                                                                <option value="Ecuador">Ecuador</option>
                                                                                <option value="Egypt">Egypt</option>
                                                                                <option value="El Salvador">El Salvador</option>
                                                                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                                                <option value="Eritrea">Eritrea</option>
                                                                                <option value="Estonia">Estonia</option>
                                                                                <option value="Eswatini">Eswatini</option>
                                                                                <option value="Ethiopia">Ethiopia</option>
                                                                                <option value="Europe Union">Europe Union</option>
                                                                                <option value="Falkland Islands">Falkland Islands</option>
                                                                                <option value="Faroe Islands">Faroe Islands</option>
                                                                                <option value="Fiji">Fiji</option>
                                                                                <option value="Finland">Finland</option>
                                                                                <option value="France">France</option>
                                                                                <option value="French Guiana">French Guiana</option>
                                                                                <option value="French Polynesia">French Polynesia</option>
                                                                                <option value="French Southern and Antarctic Lands">French Southern and Antarctic Lands</option>
                                                                                <option value="Gabon">Gabon</option>
                                                                                <option value="Gambia">Gambia</option>
                                                                                <option value="Georgia">Georgia</option>
                                                                                <option value="Germany">Germany</option>
                                                                                <option value="Ghana">Ghana</option>
                                                                                <option value="Gibraltar">Gibraltar</option>
                                                                                <option value="Greece">Greece</option>
                                                                                <option value="Greenland">Greenland</option>
                                                                                <option value="Grenada">Grenada</option>
                                                                                <option value="Guadeloupe">Guadeloupe</option>
                                                                                <option value="Guam">Guam</option>
                                                                                <option value="Guatemala">Guatemala</option>
                                                                                <option value="Guernsey">Guernsey</option>
                                                                                <option value="Guinea">Guinea</option>
                                                                                <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                                                <option value="Guyana">Guyana</option>
                                                                                <option value="Haiti">Haiti</option>
                                                                                <option value="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
                                                                                <option value="Honduras">Honduras</option>
                                                                                <option value="Hong Kong">Hong Kong</option>
                                                                                <option value="Hungary">Hungary</option>
                                                                                <option value="Iceland">Iceland</option>
                                                                                <option value="India">India</option>
                                                                                <option value="Indian Ocean Ter.">Indian Ocean Ter.</option>
                                                                                <option value="Indonesia">Indonesia</option>
                                                                                <option value="Iran">Iran</option>
                                                                                <option value="Iraq">Iraq</option>
                                                                                <option value="Ireland">Ireland</option>
                                                                                <option value="Isle of Man">Isle of Man</option>
                                                                                <option value="Israel">Israel</option>
                                                                                <option value="Italy">Italy</option>
                                                                                <option value="Ivory Coast">Ivory Coast</option>
                                                                                <option value="Jamaica">Jamaica</option>
                                                                                <option value="Japan">Japan</option>
                                                                                <option value="Jersey">Jersey</option>
                                                                                <option value="Jordan">Jordan</option>
                                                                                <option value="Kazakhstan">Kazakhstan</option>
                                                                                <option value="Kenya">Kenya</option>
                                                                                <option value="Kiribati">Kiribati</option>
                                                                                <option value="Kosovo">Kosovo</option>
                                                                                <option value="Kuwait">Kuwait</option>
                                                                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                                                <option value="Laos">Laos</option>
                                                                                <option value="Latvia">Latvia</option>
                                                                                <option value="Lebanon">Lebanon</option>
                                                                                <option value="Lesotho">Lesotho</option>
                                                                                <option value="Liberia">Liberia</option>
                                                                                <option value="Libya">Libya</option>
                                                                                <option value="Liechtenstein">Liechtenstein</option>
                                                                                <option value="Lithuania">Lithuania</option>
                                                                                <option value="Luxembourg">Luxembourg</option>
                                                                                <option value="Macau">Macau</option>
                                                                                <option value="Madagascar">Madagascar</option>
                                                                                <option value="Malawi">Malawi</option>
                                                                                <option value="Malaysia">Malaysia</option>
                                                                                <option value="Maldives">Maldives</option>
                                                                                <option value="Mali">Mali</option>
                                                                                <option value="Malta">Malta</option>
                                                                                <option value="Marshall Islands">Marshall Islands</option>
                                                                                <option value="Martinique">Martinique</option>
                                                                                <option value="Mauritania">Mauritania</option>
                                                                                <option value="Mauritius">Mauritius</option>
                                                                                <option value="Mayotte">Mayotte</option>
                                                                                <option value="Mexico">Mexico</option>
                                                                                <option value="Micronesia">Micronesia</option>
                                                                                <option value="Moldova">Moldova</option>
                                                                                <option value="Monaco">Monaco</option>
                                                                                <option value="Mongolia">Mongolia</option>
                                                                                <option value="Montenegro">Montenegro</option>
                                                                                <option value="Montserrat">Montserrat</option>
                                                                                <option value="Morocco">Morocco</option>
                                                                                <option value="Mozambique">Mozambique</option>
                                                                                <option value="Myanmar">Myanmar</option>
                                                                                <option value="N. Cyprus">N. Cyprus</option>
                                                                                <option value="Namibia">Namibia</option>
                                                                                <option value="Nauru">Nauru</option>
                                                                                <option value="Nepal">Nepal</option>
                                                                                <option value="Netherlands">Netherlands</option>
                                                                                <option value="New Caledonia">New Caledonia</option>
                                                                                <option value="New Zealand">New Zealand</option>
                                                                                <option value="Nicaragua">Nicaragua</option>
                                                                                <option value="Niger">Niger</option>
                                                                                <option value="Nigeria">Nigeria</option>
                                                                                <option value="Niue">Niue</option>
                                                                                <option value="Norfolk Island">Norfolk Island</option>
                                                                                <option value="North Korea">North Korea</option>
                                                                                <option value="North Macedonia">North Macedonia</option>
                                                                                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                                                <option value="Norway">Norway</option>
                                                                                <option value="Oman">Oman</option>
                                                                                <option value="Pakistan">Pakistan</option>
                                                                                <option value="Palau">Palau</option>
                                                                                <option value="Palestine">Palestine</option>
                                                                                <option value="Panama">Panama</option>
                                                                                <option value="Papua New Guinea">Papua New Guinea</option>
                                                                                <option value="Paraguay">Paraguay</option>
                                                                                <option value="Peru">Peru</option>
                                                                                <option value="Philippines">Philippines</option>
                                                                                <option value="Pitcairn Islands">Pitcairn Islands</option>
                                                                                <option value="Poland">Poland</option>
                                                                                <option value="Portugal">Portugal</option>
                                                                                <option value="Puerto Rico">Puerto Rico</option>
                                                                                <option value="Qatar">Qatar</option>
                                                                                <option value="Republic of the Congo">Republic of the Congo</option>
                                                                                <option value="Romania">Romania</option>
                                                                                <option value="Russia">Russia</option>
                                                                                <option value="Rwanda">Rwanda</option>
                                                                                <option value="Réunion">Réunion</option>
                                                                                <option value="Saint Barthélemy">Saint Barthélemy</option>
                                                                                <option value="Saint Helena, Ascension and Tristan da Cunha">Saint Helena, Ascension and Tristan da Cunha</option>
                                                                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                                                <option value="Saint Lucia">Saint Lucia</option>
                                                                                <option value="Saint Martin">Saint Martin</option>
                                                                                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                                                <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                                                                <option value="Samoa">Samoa</option>
                                                                                <option value="San Marino">San Marino</option>
                                                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                                                <option value="Scarborough Reef">Scarborough Reef</option>
                                                                                <option value="Senegal">Senegal</option>
                                                                                <option value="Serbia">Serbia</option>
                                                                                <option value="Serranilla Bank">Serranilla Bank</option>
                                                                                <option value="Seychelles">Seychelles</option>
                                                                                <option value="Siachen Glacier">Siachen Glacier</option>
                                                                                <option value="Sierra Leone">Sierra Leone</option>
                                                                                <option value="Singapore">Singapore</option>
                                                                                <option value="Sint Maarten">Sint Maarten</option>
                                                                                <option value="Slovakia">Slovakia</option>
                                                                                <option value="Slovenia">Slovenia</option>
                                                                                <option value="Solomon Islands">Solomon Islands</option>
                                                                                <option value="Somalia">Somalia</option>
                                                                                <option value="Somaliland">Somaliland</option>
                                                                                <option value="South Africa">South Africa</option>
                                                                                <option value="South Georgia">South Georgia</option>
                                                                                <option value="South Korea">South Korea</option>
                                                                                <option value="South Sudan">South Sudan</option>
                                                                                <option value="Spain">Spain</option>
                                                                                <option value="Spratly Is.">Spratly Is.</option>
                                                                                <option value="Sri Lanka">Sri Lanka</option>
                                                                                <option value="Sudan">Sudan</option>
                                                                                <option value="Suriname">Suriname</option>
                                                                                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                                                <option value="Sweden">Sweden</option>
                                                                                <option value="Switzerland">Switzerland</option>
                                                                                <option value="Syria">Syria</option>
                                                                                <option value="São Tomé and Príncipe">São Tomé and Príncipe</option>
                                                                                <option value="Taiwan">Taiwan</option>
                                                                                <option value="Tajikistan">Tajikistan</option>
                                                                                <option value="Tanzania">Tanzania</option>
                                                                                <option value="Thailand">Thailand</option>
                                                                                <option value="Timor-Leste">Timor-Leste</option>
                                                                                <option value="Togo">Togo</option>
                                                                                <option value="Tokelau">Tokelau</option>
                                                                                <option value="Tonga">Tonga</option>
                                                                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                                                <option value="Tunisia">Tunisia</option>
                                                                                <option value="Turkey">Turkey</option>
                                                                                <option value="Turkmenistan">Turkmenistan</option>
                                                                                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                                                <option value="Tuvalu">Tuvalu</option>
                                                                                <option value="USNB Guantanamo Bay">USNB Guantanamo Bay</option>
                                                                                <option value="Uganda">Uganda</option>
                                                                                <option value="Ukraine">Ukraine</option>
                                                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                                                <option value="United Kingdom">United Kingdom</option>
                                                                                <option value="United States">United States</option>
                                                                                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                                                <option value="United States Virgin Islands">United States Virgin Islands</option>
                                                                                <option value="Uruguay">Uruguay</option>
                                                                                <option value="Uzbekistan">Uzbekistan</option>
                                                                                <option value="Vanuatu">Vanuatu</option>
                                                                                <option value="Vatican City">Vatican City</option>
                                                                                <option value="Venezuela">Venezuela</option>
                                                                                <option value="Vietnam">Vietnam</option>
                                                                                <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                                                <option value="Western Sahara">Western Sahara</option>
                                                                                <option value="Yemen">Yemen</option>
                                                                                <option value="Zambia">Zambia</option>
                                                                                <option value="Zimbabwe">Zimbabwe</option>
                                                                                <option value="Åland Islands">Åland Islands</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group col-md-12 mt-1">
                                                                            <div><label class="label-block">Email</label></div>
                                                                            <input type="text" name="email" value="{{ old('email', optional($user)->email) }}" class="form-control" placeholder="Email" disabled="">
                                                                        </div>

                                                                        <div class="form-group col-md-12 mt-1">
                                                                            <div><label class="label-block">Username</label></div>
                                                                            <input type="text" name="username" value="{{ old('username', optional($user)->username) }}" class="form-control" placeholder="Username" disabled="">
                                                                        </div>


                                                                        <div class="form-group col-md-12 mt-1">
                                                                            <div><label class="label-block">Gender</label></div>
                                                                            <select name="gender" id="" class="form-control">
                                                                                <option value="Male">Male</option>
                                                                                <option value="Female">Female</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12 mt-1">
                                                                            <div><label class="label-block">Phone</label></div>
                                                                            <input type="text" name="phone" value="{{ old('phone', optional($user)->phone) }}" class="form-control" placeholder="Phone" required="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 mx-auto">
                                                                        <button type="submit" name="update" class="btn btn-primary col-sm-12">Update Account</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="tab-pane" id="tab22">



                                                                <form class="form-horizontal" method="POST" action="">
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-12 mt-1">
                                                                            <label class="label-block">Current Password</label>
                                                                            <input type="text" name="current_password" class="form-control" required="">
                                                                        </div>
                                                                        <div class="form-group col-md-12 mt-1">
                                                                            <label class="label-block">New Password</label>
                                                                            <input type="password" name="new_password" class="form-control" required="">
                                                                        </div>
                                                                        <div class="form-group col-md-12 mt-1">
                                                                            <label class="label-block">Confirm Pasword</label>
                                                                            <input type="password" name="confirm_password" class="form-control" required="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 mx-auto">
                                                                        <button type="submit" name="reset" class="btn btn-primary col-sm-12">Update Password</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /div -->
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection
