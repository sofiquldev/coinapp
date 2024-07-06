@extends('layouts.admin-dashboard')

@section('content')
<div class="container-fluid ">
    <div class="row">
        <div class="col-12">
            <div class="top-area flex-wrap d-center justify-content-between gap-8 row-gap-3">
                <h2>Settings</h2>
            </div>
        </div>
    </div>
    <div class="row gy-5">
        <div class="col-xxl-6">
            <div class="box_part_area n0-bg cus-rounded-1 p-4 p-md-7 p-xxl-10 cus-border h-100">
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-8 row-gap-3">
                    <h4>Account Settings</h4>
                </div>
                <div class="box_part__content">
                    <form class="d-flex flex-column gap-5 gap-lg-6 w-100 cus-border-dashed top border-color-30 pt-5 pt-xxl-6 mt-5 mt-xxl-6">
                        <span class="fs-six-up fw-medium">Profile Photo</span>
                        <div class="flex-wrap cus-border-dashed bottom pb-5 pb-lg-6 border-color-30 d-flex align-items-center gap-5 gap-lg-6">
                            <div class="user_thumbs">
                                <img src="{{ asset('images/no-avatar.webp') }}" class="box_30 cus-rounded-1" alt="image">
                            </div>
                            <div class="d-flex gap-4">
                                <label for="file_upload" class="btn btn-sm btn_box cus-border border-color fw-semibold py-2 py-lg-3 px-3 px-sm-4 px-lg-5 px-xxl-6">Upload
                                    Image
                                    <input type="file" name="file_upload" id="file_upload" class="visually-hidden">
                                </label>
                                <button type="reset" class="btn_box btn_alt cus-border border-color  py-2 py-lg-3 px-3 px-sm-4 px-lg-5 px-xxl-6">
                                    Cancel</button>
                            </div>
                        </div>
                        <div class="row gap-3 gap-sm-0">
                            <div class="col-sm-6">
                                <div class="single-input">
                                    <label for="fname" class="fs-six-up fw-medium mb-2 mb-sm-4">First Name</label>
                                    <input type="text" class="fs-seven py-3 py-4 px-6 px-lg-8" id="fname" value="Darrel" placeholder="Enter First Name" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="single-input">
                                    <label for="lname" class="fs-six-up fw-medium mb-2 mb-sm-4">Last Name</label>
                                    <input type="text" class="fs-seven py-3 py-4 px-6 px-lg-8" id="lname" value="Steward" placeholder="Enter Last Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="single-input">
                            <label for="email" class="fs-six-up fw-medium mb-2 mb-sm-4">Gmail</label>
                            <input type="text" class="fs-seven py-3 py-4 px-6 px-lg-8" value="Example@email.com" id="email" placeholder="Enter Gmail Account" required>
                        </div>
                        <div class="single-input">
                            <label for="phone" class="fs-six-up fw-medium mb-2 mb-sm-4">Phone <span class="n100-color">(Optional)</span></label>
                            <input type="text" class="fs-seven py-3 py-4 px-6 px-lg-8" value="+0123 456 789" id="phone" placeholder="Enter Gmail Account" required>
                        </div>
                        <div class="single-input">
                            <label for="phone" class="fs-six-up fw-medium mb-2 mb-sm-4">Gender :</label>
                            <div class="d-flex gap-5 gap-lg-6">
                                <div class="d-center gap-2">
                                    <input class="form-radio-input" type="radio" name="gender" id="male" checked>
                                    <label class="form-radio-label" for="male">Male </label>
                                </div>
                                <div class="d-center gap-2">
                                    <input class="form-radio-input" type="radio" name="gender" id="femail">
                                    <label class="form-radio-label" for="femail"> Female </label>
                                </div>
                                <div class="d-center gap-2">
                                    <input class="form-radio-input" type="radio" name="gender" id="others">
                                    <label class="form-radio-label" for="others"> Others </label>
                                </div>
                            </div>
                        </div>
                        <div class="single-input">
                            <label class="fs-six-up fw-medium mb-2 mb-sm-4">Tagline :</label>
                            <div id="editor" class="text_editor_area bg1-opty  cus-rounded-1 top ">
                                <span>Hello i am</span>
                            </div>
                        </div>
                        <div class="d-flex flex-column gap-4">
                            <div class="form-check form-check-linethrough d-flex align-items-center gap-2 gap-lg-3">
                                <input type="checkbox" class="form-check-input flex-none box_5 rounded-circle" id="checkbox1" checked>
                                <label for="checkbox1">I agree to the privacy & policy</label>
                            </div>
                            <div class="form-check form-check-linethrough d-flex align-items-center gap-2 gap-lg-3">
                                <input type="checkbox" class="form-check-input  flex-none box_5 rounded-circle" id="checkbox2" checked>
                                <label for="checkbox2">I agree with all terms & conditions</label>
                            </div>
                        </div>
                        <div class="d-flex gap-5 gap-lg-6 pt-4">
                            <button type="button" class="btn_box py-2 py-lg-3 px-5 px-lg-6 cus-rounded-1 cus-border border-color">Save
                                Change</button>
                            <button type="reset" class="btn_box btn_alt py-2 py-lg-3 px-5 px-lg-6 cus-rounded-1 cus-border border-color">Cancle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xxl-6">
            <div class="row gy-5 gy-xxl-6">
                <div class="col-12">
                    <div class="box_part_area n0-bg cus-rounded-1 p-4 p-md-7 p-xxl-10 cus-border">
                        <div class="d-flex flex-wrap justify-content-between align-items-center gap-8 row-gap-3">
                            <h4>Address</h4>
                        </div>
                        <div class="box_part__content">
                            <form class="d-flex flex-column gap-5 gap-lg-6 w-100 cus-border-dashed top border-color-30 pt-5 pt-xxl-6 mt-5 mt-xxl-6">
                                <div class="single-input">
                                    <label class="fs-six-up fw-medium mb-2 mb-sm-4">Location</label>
                                    <div class="input_select d-flex align-items-center gap-2 bg1-opty cus-border cus-rounded-1 py-3 ps-3 ps-xxl-4 ">
                                        <select class="select_form pe-7 pe-lg-10 pe-xxl-12" name="bank_name">
                                            <option value="Select Currency">Select Country</option>
                                            <option value="Option 1">Option 1</option>
                                            <option value="Option 2">Option 2 </option>
                                            <option value="Option 3">Option 3 </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row gap-3 gap-sm-0">
                                    <div class="col-sm-6">
                                        <div class="single-input">
                                            <label for="address1" class="fs-six-up fw-medium mb-2 mb-sm-4">Address
                                                1</label>
                                            <input type="text" class="fs-seven py-3 px-5 px-lg-6" id="address1" placeholder="Enter Address" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="single-input">
                                            <label for="address2" class="fs-six-up fw-medium mb-2 mb-sm-4">Address 2
                                                <span class="n100-color">(Optional)</span></label>
                                            <input type="text" class="fs-seven py-3 px-5 px-lg-6" id="address2" placeholder="Enter Address" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-input">
                                    <label for="zip" class="fs-six-up fw-medium mb-2 mb-sm-4">Zip Code</label>
                                    <input type="text" class="fs-seven py-3 px-5 px-lg-6" id="zip" placeholder="Enter Code" required>
                                </div>
                                <div class="d-flex gap-5 gap-lg-6 pt-4">
                                    <button type="button" class="btn_box py-2 py-lg-3 px-5 px-lg-6 cus-rounded-1 cus-border border-color">Save
                                        Change</button>
                                    <button type="reset" class="btn_box btn_alt py-2 py-lg-3 px-5 px-lg-6 cus-rounded-1 cus-border border-color">Cancle</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="box_part_area n0-bg cus-rounded-1 p-4 p-md-7 p-xxl-10 cus-border">
                        <div class="d-flex flex-wrap justify-content-between align-items-center gap-8 row-gap-3">
                            <h4>Default Currency</h4>
                        </div>
                        <div class="box_part__content">
                            <form class="d-flex flex-column gap-5 gap-lg-6 w-100 cus-border-dashed top border-color-30 pt-5 pt-xxl-6 mt-5 mt-xxl-6" id="site-currency-update">
                                <div class="single-input">
                                    <label for="site-currency" class="fs-six-up fw-medium mb-2 mb-sm-4">Select your default currency</label>
                                    <div class="input_select d-flex align-items-center gap-2 bg1-opty cus-border cus-rounded-1 py-3 ps-3 ps-xxl-4 ">
                                        @php
                                        if(empty($data->currency->value)) {
                                            $currencyValue = 'USD';
                                        } else {
                                            $currencyValue = $data->currency->value;
                                        }
                                        @endphp

                                        <select class="select_form pe-7 pe-lg-10 pe-xxl-12" id="site-currency">
                                            <option value="USD" {{ $currencyValue === 'USD' ? 'selected' : '' }}>US Dollar (USD)</option>
                                            <option value="EUR" {{ $currencyValue === 'EUR' ? 'selected' : '' }}>Euro (EUR)</option>
                                            <option value="JPY" {{ $currencyValue === 'JPY' ? 'selected' : '' }}>Japanese Yen (JPY)</option>
                                            <option value="GBP" {{ $currencyValue === 'GBP' ? 'selected' : '' }}>British Pound (GBP)</option>
                                            <option value="AUD" {{ $currencyValue === 'AUD' ? 'selected' : '' }}>Australian Dollar (AUD)</option>
                                            <option value="CAD" {{ $currencyValue === 'CAD' ? 'selected' : '' }}>Canadian Dollar (CAD)</option>
                                            <option value="CHF" {{ $currencyValue === 'CHF' ? 'selected' : '' }}>Swiss Franc (CHF)</option>
                                            <option value="CNY" {{ $currencyValue === 'CNY' ? 'selected' : '' }}>Chinese Yuan (CNY)</option>
                                            <option value="AFN" {{ $currencyValue === 'AFN' ? 'selected' : '' }}>Afghan Afghani (AFN)</option>
                                            <option value="ALL" {{ $currencyValue === 'ALL' ? 'selected' : '' }}>Albanian Lek (ALL)</option>
                                            <option value="DZD" {{ $currencyValue === 'DZD' ? 'selected' : '' }}>Algerian Dinar (DZD)</option>
                                            <option value="AOA" {{ $currencyValue === 'AOA' ? 'selected' : '' }}>Angolan Kwanza (AOA)</option>
                                            <option value="ARS" {{ $currencyValue === 'ARS' ? 'selected' : '' }}>Argentine Peso (ARS)</option>
                                            <option value="AMD" {{ $currencyValue === 'AMD' ? 'selected' : '' }}>Armenian Dram (AMD)</option>
                                            <option value="AWG" {{ $currencyValue === 'AWG' ? 'selected' : '' }}>Aruban Florin (AWG)</option>
                                            <option value="AZN" {{ $currencyValue === 'AZN' ? 'selected' : '' }}>Azerbaijani Manat (AZN)</option>
                                            <option value="BSD" {{ $currencyValue === 'BSD' ? 'selected' : '' }}>Bahamian Dollar (BSD)</option>
                                            <option value="BHD" {{ $currencyValue === 'BHD' ? 'selected' : '' }}>Bahraini Dinar (BHD)</option>
                                            <option value="BDT" {{ $currencyValue === 'BDT' ? 'selected' : '' }}>Bangladeshi Taka (BDT)</option>
                                            <option value="BBD" {{ $currencyValue === 'BBD' ? 'selected' : '' }}>Barbadian Dollar (BBD)</option>
                                            <option value="BYN" {{ $currencyValue === 'BYN' ? 'selected' : '' }}>Belarusian Ruble (BYN)</option>
                                            <option value="BZD" {{ $currencyValue === 'BZD' ? 'selected' : '' }}>Belize Dollar (BZD)</option>
                                            <option value="BMD" {{ $currencyValue === 'BMD' ? 'selected' : '' }}>Bermudian Dollar (BMD)</option>
                                            <option value="BTN" {{ $currencyValue === 'BTN' ? 'selected' : '' }}>Bhutanese Ngultrum (BTN)</option>
                                            <option value="BOB" {{ $currencyValue === 'BOB' ? 'selected' : '' }}>Bolivian Boliviano (BOB)</option>
                                            <option value="BAM" {{ $currencyValue === 'BAM' ? 'selected' : '' }}>Bosnia and Herzegovina Convertible Mark (BAM)</option>
                                            <option value="BWP" {{ $currencyValue === 'BWP' ? 'selected' : '' }}>Botswana Pula (BWP)</option>
                                            <option value="BRL" {{ $currencyValue === 'BRL' ? 'selected' : '' }}>Brazilian Real (BRL)</option>
                                            <option value="BND" {{ $currencyValue === 'BND' ? 'selected' : '' }}>Brunei Dollar (BND)</option>
                                            <option value="BGN" {{ $currencyValue === 'BGN' ? 'selected' : '' }}>Bulgarian Lev (BGN)</option>
                                            <option value="BIF" {{ $currencyValue === 'BIF' ? 'selected' : '' }}>Burundian Franc (BIF)</option>
                                            <option value="CVE" {{ $currencyValue === 'CVE' ? 'selected' : '' }}>Cape Verdean Escudo (CVE)</option>
                                            <option value="KHR" {{ $currencyValue === 'KHR' ? 'selected' : '' }}>Cambodian Riel (KHR)</option>
                                            <option value="XAF" {{ $currencyValue === 'XAF' ? 'selected' : '' }}>Central African CFA Franc (XAF)</option>
                                            <option value="CLP" {{ $currencyValue === 'CLP' ? 'selected' : '' }}>Chilean Peso (CLP)</option>
                                            <option value="COP" {{ $currencyValue === 'COP' ? 'selected' : '' }}>Colombian Peso (COP)</option>
                                            <option value="KMF" {{ $currencyValue === 'KMF' ? 'selected' : '' }}>Comorian Franc (KMF)</option>
                                            <option value="CDF" {{ $currencyValue === 'CDF' ? 'selected' : '' }}>Congolese Franc (CDF)</option>
                                            <option value="CRC" {{ $currencyValue === 'CRC' ? 'selected' : '' }}>Costa Rican Colón (CRC)</option>
                                            <option value="HRK" {{ $currencyValue === 'HRK' ? 'selected' : '' }}>Croatian Kuna (HRK)</option>
                                            <option value="CUP" {{ $currencyValue === 'CUP' ? 'selected' : '' }}>Cuban Peso (CUP)</option>
                                            <option value="CZK" {{ $currencyValue === 'CZK' ? 'selected' : '' }}>Czech Koruna (CZK)</option>
                                            <option value="DKK" {{ $currencyValue === 'DKK' ? 'selected' : '' }}>Danish Krone (DKK)</option>
                                            <option value="DJF" {{ $currencyValue === 'DJF' ? 'selected' : '' }}>Djiboutian Franc (DJF)</option>
                                            <option value="DOP" {{ $currencyValue === 'DOP' ? 'selected' : '' }}>Dominican Peso (DOP)</option>
                                            <option value="EGP" {{ $currencyValue === 'EGP' ? 'selected' : '' }}>Egyptian Pound (EGP)</option>
                                            <option value="ERN" {{ $currencyValue === 'ERN' ? 'selected' : '' }}>Eritrean Nakfa (ERN)</option>
                                            <option value="ETB" {{ $currencyValue === 'ETB' ? 'selected' : '' }}>Ethiopian Birr (ETB)</option>
                                            <option value="FJD" {{ $currencyValue === 'FJD' ? 'selected' : '' }}>Fijian Dollar (FJD)</option>
                                            <option value="GMD" {{ $currencyValue === 'GMD' ? 'selected' : '' }}>Gambian Dalasi (GMD)</option>
                                            <option value="GEL" {{ $currencyValue === 'GEL' ? 'selected' : '' }}>Georgian Lari (GEL)</option>
                                            <option value="GHS" {{ $currencyValue === 'GHS' ? 'selected' : '' }}>Ghanaian Cedi (GHS)</option>
                                            <option value="GIP" {{ $currencyValue === 'GIP' ? 'selected' : '' }}>Gibraltar Pound (GIP)</option>
                                            <option value="GTQ" {{ $currencyValue === 'GTQ' ? 'selected' : '' }}>Guatemalan Quetzal (GTQ)</option>
                                            <option value="GNF" {{ $currencyValue === 'GNF' ? 'selected' : '' }}>Guinean Franc (GNF)</option>
                                            <option value="GYD" {{ $currencyValue === 'GYD' ? 'selected' : '' }}>Guyanese Dollar (GYD)</option>
                                            <option value="HTG" {{ $currencyValue === 'HTG' ? 'selected' : '' }}>Haitian Gourde (HTG)</option>
                                            <option value="HNL" {{ $currencyValue === 'HNL' ? 'selected' : '' }}>Honduran Lempira (HNL)</option>
                                            <option value="HKD" {{ $currencyValue === 'HKD' ? 'selected' : '' }}>Hong Kong Dollar (HKD)</option>
                                            <option value="HUF" {{ $currencyValue === 'HUF' ? 'selected' : '' }}>Hungarian Forint (HUF)</option>
                                            <option value="ISK" {{ $currencyValue === 'ISK' ? 'selected' : '' }}>Icelandic Króna (ISK)</option>
                                            <option value="INR" {{ $currencyValue === 'INR' ? 'selected' : '' }}>Indian Rupee (INR)</option>
                                            <option value="IDR" {{ $currencyValue === 'IDR' ? 'selected' : '' }}>Indonesian Rupiah (IDR)</option>
                                            <option value="IRR" {{ $currencyValue === 'IRR' ? 'selected' : '' }}>Iranian Rial (IRR)</option>
                                            <option value="IQD" {{ $currencyValue === 'IQD' ? 'selected' : '' }}>Iraqi Dinar (IQD)</option>
                                            <option value="ILS" {{ $currencyValue === 'ILS' ? 'selected' : '' }}>Israeli New Shekel (ILS)</option>
                                            <option value="JMD" {{ $currencyValue === 'JMD' ? 'selected' : '' }}>Jamaican Dollar (JMD)</option>
                                            <option value="JOD" {{ $currencyValue === 'JOD' ? 'selected' : '' }}>Jordanian Dinar (JOD)</option>
                                            <option value="KZT" {{ $currencyValue === 'KZT' ? 'selected' : '' }}>Kazakhstani Tenge (KZT)</option>
                                            <option value="KES" {{ $currencyValue === 'KES' ? 'selected' : '' }}>Kenyan Shilling (KES)</option>
                                            <option value="KWD" {{ $currencyValue === 'KWD' ? 'selected' : '' }}>Kuwaiti Dinar (KWD)</option>
                                            <option value="KGS" {{ $currencyValue === 'KGS' ? 'selected' : '' }}>Kyrgyzstani Som (KGS)</option>
                                            <option value="LAK" {{ $currencyValue === 'LAK' ? 'selected' : '' }}>Lao Kip (LAK)</option>
                                            <option value="LBP" {{ $currencyValue === 'LBP' ? 'selected' : '' }}>Lebanese Pound (LBP)</option>
                                            <option value="LSL" {{ $currencyValue === 'LSL' ? 'selected' : '' }}>Lesotho Loti (LSL)</option>
                                            <option value="LRD" {{ $currencyValue === 'LRD' ? 'selected' : '' }}>Liberian Dollar (LRD)</option>
                                            <option value="LYD" {{ $currencyValue === 'LYD' ? 'selected' : '' }}>Libyan Dinar (LYD)</option>
                                            <option value="MOP" {{ $currencyValue === 'MOP' ? 'selected' : '' }}>Macanese Pataca (MOP)</option>
                                            <option value="MKD" {{ $currencyValue === 'MKD' ? 'selected' : '' }}>Macedonian Denar (MKD)</option>
                                            <option value="MGA" {{ $currencyValue === 'MGA' ? 'selected' : '' }}>Malagasy Ariary (MGA)</option>
                                            <option value="MWK" {{ $currencyValue === 'MWK' ? 'selected' : '' }}>Malawian Kwacha (MWK)</option>
                                            <option value="MYR" {{ $currencyValue === 'MYR' ? 'selected' : '' }}>Malaysian Ringgit (MYR)</option>
                                            <option value="MVR" {{ $currencyValue === 'MVR' ? 'selected' : '' }}>Maldivian Rufiyaa (MVR)</option>
                                            <option value="MRO" {{ $currencyValue === 'MRO' ? 'selected' : '' }}>Mauritanian Ouguiya (MRO)</option>
                                            <option value="MUR" {{ $currencyValue === 'MUR' ? 'selected' : '' }}>Mauritian Rupee (MUR)</option>
                                            <option value="MXN" {{ $currencyValue === 'MXN' ? 'selected' : '' }}>Mexican Peso (MXN)</option>
                                            <option value="MDL" {{ $currencyValue === 'MDL' ? 'selected' : '' }}>Moldovan Leu (MDL)</option>
                                            <option value="MNT" {{ $currencyValue === 'MNT' ? 'selected' : '' }}>Mongolian Tögrög (MNT)</option>
                                            <option value="MAD" {{ $currencyValue === 'MAD' ? 'selected' : '' }}>Moroccan Dirham (MAD)</option>
                                            <option value="MZN" {{ $currencyValue === 'MZN' ? 'selected' : '' }}>Mozambican Metical (MZN)</option>
                                            <option value="MMK" {{ $currencyValue === 'MMK' ? 'selected' : '' }}>Myanmar Kyat (MMK)</option>
                                            <option value="NAD" {{ $currencyValue === 'NAD' ? 'selected' : '' }}>Namibian Dollar (NAD)</option>
                                            <option value="NPR" {{ $currencyValue === 'NPR' ? 'selected' : '' }}>Nepalese Rupee (NPR)</option>
                                            <option value="ANG" {{ $currencyValue === 'ANG' ? 'selected' : '' }}>Netherlands Antillean Guilder (ANG)</option>
                                            <option value="NZD" {{ $currencyValue === 'NZD' ? 'selected' : '' }}>New Zealand Dollar (NZD)</option>
                                            <option value="NIO" {{ $currencyValue === 'NIO' ? 'selected' : '' }}>Nicaraguan Córdoba (NIO)</option>
                                            <option value="NGN" {{ $currencyValue === 'NGN' ? 'selected' : '' }}>Nigerian Naira (NGN)</option>
                                            <option value="KPW" {{ $currencyValue === 'KPW' ? 'selected' : '' }}>North Korean Won (KPW)</option>
                                            <option value="NOK" {{ $currencyValue === 'NOK' ? 'selected' : '' }}>Norwegian Krone (NOK)</option>
                                            <option value="OMR" {{ $currencyValue === 'OMR' ? 'selected' : '' }}>Omani Rial (OMR)</option>
                                            <option value="PKR" {{ $currencyValue === 'PKR' ? 'selected' : '' }}>Pakistani Rupee (PKR)</option>
                                            <option value="PAB" {{ $currencyValue === 'PAB' ? 'selected' : '' }}>Panamanian Balboa (PAB)</option>
                                            <option value="PGK" {{ $currencyValue === 'PGK' ? 'selected' : '' }}>Papua New Guinean Kina (PGK)</option>
                                            <option value="PYG" {{ $currencyValue === 'PYG' ? 'selected' : '' }}>Paraguayan Guaraní (PYG)</option>
                                            <option value="PEN" {{ $currencyValue === 'PEN' ? 'selected' : '' }}>Peruvian Sol (PEN)</option>
                                            <option value="PHP" {{ $currencyValue === 'PHP' ? 'selected' : '' }}>Philippine Peso (PHP)</option>
                                            <option value="PLN" {{ $currencyValue === 'PLN' ? 'selected' : '' }}>Polish Złoty (PLN)</option>
                                            <option value="QAR" {{ $currencyValue === 'QAR' ? 'selected' : '' }}>Qatari Riyal (QAR)</option>
                                            <option value="RON" {{ $currencyValue === 'RON' ? 'selected' : '' }}>Romanian Leu (RON)</option>
                                            <option value="RUB" {{ $currencyValue === 'RUB' ? 'selected' : '' }}>Russian Ruble (RUB)</option>
                                            <option value="RWF" {{ $currencyValue === 'RWF' ? 'selected' : '' }}>Rwandan Franc (RWF)</option>
                                            <option value="SHP" {{ $currencyValue === 'SHP' ? 'selected' : '' }}>Saint Helena Pound (SHP)</option>
                                            <option value="WST" {{ $currencyValue === 'WST' ? 'selected' : '' }}>Samoan Tālā (WST)</option>
                                            <option value="STD" {{ $currencyValue === 'STD' ? 'selected' : '' }}>São Tomé and Príncipe Dobra (STD)</option>
                                            <option value="SAR" {{ $currencyValue === 'SAR' ? 'selected' : '' }}>Saudi Riyal (SAR)</option>
                                            <option value="RSD" {{ $currencyValue === 'RSD' ? 'selected' : '' }}>Serbian Dinar (RSD)</option>
                                            <option value="SCR" {{ $currencyValue === 'SCR' ? 'selected' : '' }}>Seychellois Rupee (SCR)</option>
                                            <option value="SLL" {{ $currencyValue === 'SLL' ? 'selected' : '' }}>Sierra Leonean Leone (SLL)</option>
                                            <option value="SGD" {{ $currencyValue === 'SGD' ? 'selected' : '' }}>Singapore Dollar (SGD)</option>
                                            <option value="SBD" {{ $currencyValue === 'SBD' ? 'selected' : '' }}>Solomon Islands Dollar (SBD)</option>
                                            <option value="SOS" {{ $currencyValue === 'SOS' ? 'selected' : '' }}>Somali Shilling (SOS)</option>
                                            <option value="ZAR" {{ $currencyValue === 'ZAR' ? 'selected' : '' }}>South African Rand (ZAR)</option>
                                            <option value="KRW" {{ $currencyValue === 'KRW' ? 'selected' : '' }}>South Korean Won (KRW)</option>
                                            <option value="SSP" {{ $currencyValue === 'SSP' ? 'selected' : '' }}>South Sudanese Pound (SSP)</option>
                                            <option value="LKR" {{ $currencyValue === 'LKR' ? 'selected' : '' }}>Sri Lankan Rupee (LKR)</option>
                                            <option value="SDG" {{ $currencyValue === 'SDG' ? 'selected' : '' }}>Sudanese Pound (SDG)</option>
                                            <option value="SRD" {{ $currencyValue === 'SRD' ? 'selected' : '' }}>Surinamese Dollar (SRD)</option>
                                            <option value="SZL" {{ $currencyValue === 'SZL' ? 'selected' : '' }}>Swazi Lilangeni (SZL)</option>
                                            <option value="SEK" {{ $currencyValue === 'SEK' ? 'selected' : '' }}>Swedish Krona (SEK)</option>
                                            <option value="SYP" {{ $currencyValue === 'SYP' ? 'selected' : '' }}>Syrian Pound (SYP)</option>
                                            <option value="TWD" {{ $currencyValue === 'TWD' ? 'selected' : '' }}>Taiwan Dollar (TWD)</option>
                                            <option value="TJS" {{ $currencyValue === 'TJS' ? 'selected' : '' }}>Tajikistani Somoni (TJS)</option>
                                            <option value="TZS" {{ $currencyValue === 'TZS' ? 'selected' : '' }}>Tanzanian Shilling (TZS)</option>
                                            <option value="THB" {{ $currencyValue === 'THB' ? 'selected' : '' }}>Thai Baht (THB)</option>
                                            <option value="TOP" {{ $currencyValue === 'TOP' ? 'selected' : '' }}>Tongan Paʻanga (TOP)</option>
                                            <option value="TTD" {{ $currencyValue === 'TTD' ? 'selected' : '' }}>Trinidad and Tobago Dollar (TTD)</option>
                                            <option value="TND" {{ $currencyValue === 'TND' ? 'selected' : '' }}>Tunisian Dinar (TND)</option>
                                            <option value="TRY" {{ $currencyValue === 'TRY' ? 'selected' : '' }}>Turkish Lira (TRY)</option>
                                            <option value="TMT" {{ $currencyValue === 'TMT' ? 'selected' : '' }}>Turkmenistani Manat (TMT)</option>
                                            <option value="UGX" {{ $currencyValue === 'UGX' ? 'selected' : '' }}>Ugandan Shilling (UGX)</option>
                                            <option value="UAH" {{ $currencyValue === 'UAH' ? 'selected' : '' }}>Ukrainian Hryvnia (UAH)</option>
                                            <option value="AED" {{ $currencyValue === 'AED' ? 'selected' : '' }}>United Arab Emirates Dirham (AED)</option>
                                            <option value="UYU" {{ $currencyValue === 'UYU' ? 'selected' : '' }}>Uruguayan Peso (UYU)</option>
                                            <option value="UZS" {{ $currencyValue === 'UZS' ? 'selected' : '' }}>Uzbekistani Som (UZS)</option>
                                            <option value="VUV" {{ $currencyValue === 'VUV' ? 'selected' : '' }}>Vanuatu Vatu (VUV)</option>
                                            <option value="VES" {{ $currencyValue === 'VES' ? 'selected' : '' }}>Venezuelan Bolívar (VES)</option>
                                            <option value="VND" {{ $currencyValue === 'VND' ? 'selected' : '' }}>Vietnamese Đồng (VND)</option>
                                            <option value="YER" {{ $currencyValue === 'YER' ? 'selected' : '' }}>Yemeni Rial (YER)</option>
                                            <option value="ZMW" {{ $currencyValue === 'ZMW' ? 'selected' : '' }}>Zambian Kwacha (ZMW)</option>
                                            <option value="ZWL" {{ $currencyValue === 'ZWL' ? 'selected' : '' }}>Zimbabwean Dollar (ZWL)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex gap-5 gap-lg-6 pt-4">
                                    <button type="submit" class="btn_box py-2 py-lg-3 px-5 px-lg-6 cus-rounded-1 cus-border border-color">Save Change</button>
                                    <button type="reset" class="btn_box btn_alt py-2 py-lg-3 px-5 px-lg-6 cus-rounded-1 cus-border border-color">Cancle</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="box_part_area n0-bg cus-rounded-1 p-4 p-md-7 p-xxl-10 cus-border">
                        <div class="d-flex flex-wrap justify-content-between align-items-center gap-8 row-gap-3">
                            <h4>Service Fee</h4>
                            <small>Profit Margin</small>
                        </div>
                        <div class="box_part__content">
                            <form class="d-flex flex-column gap-5 gap-lg-6 w-100 cus-border-dashed top border-color-30 pt-5 pt-xxl-6 mt-5 mt-xxl-6" id="site-service-fee-update">
                                <div class="single-input">
                                    <label for="site-service-fee" class="fs-six-up fw-medium mb-2 mb-sm-4">Set Your Service fee (%)</label>
                                    <input type="number" step="0.1" class="fs-seven py-3 px-5 px-lg-6" id="site-service-fee" placeholder="6.15%" required value="{{ $data->serviceFee ? $data->serviceFee : env("SITE_SERVICE_FEE", 5)}}">
                                </div>
                                <div class="d-flex gap-5 gap-lg-6 pt-4">
                                    <button type="submit" class="btn_box py-2 py-lg-3 px-5 px-lg-6 cus-rounded-1 cus-border border-color">Save Change</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-12">
                        <div class="box_part_area n0-bg cus-rounded-1  p-4 p-md-7 p-xxl-10 cus-border">
                            <div class="d-flex flex-wrap justify-content-between align-items-center gap-8 row-gap-3">
                                <h4>Delete your account</h4>
                            </div>
                            <div class="box_part__content">
                                <form
                                    class="d-flex flex-column gap-5 gap-lg-6 w-100 cus-border-dashed top border-color-30 pt-5 pt-xxl-6 mt-5 mt-xxl-6">
                                    <div class="d-flex flex-column gap-4">
                                        <p class="fs-seven">When you delete your account, you lose access to Front account
                                            services, and we permanently delete your personal data. You can cancel the
                                            deletion for 14 days.</p>
                                        <div
                                            class="form-check form-check-linethrough d-flex align-items-center gap-2 gap-lg-3">
                                            <input class="form-check-input  flex-none box_5 rounded-circle"
                                                id="checkbox10" type="checkbox" checked>
                                            <label for="checkbox10">Confirm that I want to delete my account.</label>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-5 gap-lg-6 pt-4">
                                        <button type="reset"
                                            class="btn_box btn_alt py-2 py-lg-3 px-5 px-lg-6 cus-rounded-1 cus-border border-color">Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#site-currency-update').on('submit', function(e) {
            e.preventDefault();

            let currency = $('#site-currency').val();
            let token = '{{ csrf_token() }}';

            $.ajax({
                url: '{{ route('dashboard.options.update') }}',
                method: 'POST',
                data: {
                    _token: token,
                    key: 'site-currency',
                    value: currency
                },
                success: function(response) {
                    alert(response.message); // Show "Saved!" message
                },
                error: function(xhr, status, error) {
                    alert('An error occurred: ' + xhr.responseText);
                }
            });
        });
        $('#site-service-fee-update').on('submit', function(e) {
            e.preventDefault();

            let serviceFee = $('#site-service-fee').val();
            let token = '{{ csrf_token() }}';

            $.ajax({
                url: '{{ route('dashboard.options.update') }}',
                method: 'POST',
                data: {
                    _token: token,
                    key: 'site-service-fee',
                    value: serviceFee
                },
                success: function(response) {
                    alert(response.message); // Show "Saved!" message
                },
                error: function(xhr, status, error) {
                    alert('An error occurred: ' + xhr.responseText);
                }
            });
        });
    });
</script>
@endsection