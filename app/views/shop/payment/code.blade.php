@extends('layouts.page1')
@include('menus.base')

@section('header')
    {{ HTML::style('css/shop.css') }}
@stop

@section('content')
                <div class="content">
                    <h1 class="content-title">
                        <span class="icon-big icon-shop"></span> Achat d'ogrines
                    </h1>

                    <div class="shop">
                        <div class="shop-content">
                            <div class="title">
                                <span class="picto"></span> Paiement par {{ $method }} &nbsp;<span class="icon-flag flag-{{ $country }}"></span>
                            </div>
                            <div class="payment">
                                <div class="payment-info left">
@if ($method == 'audiotel' || $method == 'mobilecall')
                                    Pour obtenir votre code, appelez le
                                    <div class="payment-number">{{ $starpass->audiotelPhone }}</div>
                                    <div class="payment-cost">
                                        La communication vous sera facturée :<br />
                                        {{ $starpass->audiotelFixedCostDetail }}/appel {{ $starpass->audiotelVariableCostDetail }}/min depuis une ligne fixe<br />
                                        Obtention du code en < 1,30 min. Coût : {{ $starpass->fCostPerAction + (substr($starpass->audiotelVariableCostDetail, 2, 5) * 1.5) }} {{ $starpass->sCurrencyToDisplay }}
                                    </div>
@elseif ($method == 'sms')
                                    <div class="payment-number">Envoyer <b>{{ $starpass->smsKeyword }}</b> au <b>{{ $starpass->smsPhoneNumber }}</b></div>
                                    <div class="payment-cost">
                                        {{ $starpass->smsCostDetail }}/SMS + prix d'un SMS<br />
                                        1 envoi de SMS par code d'accès
                                    </div>
@endif
                                </div>
                                <div class="right" style="text-align: right;">
                                    En cas de problème, veuillez contacter le <a href="#">support</a>
                                    <div class="payment-code form-group">
                                        {{ Form::open(array('route' => 'shop.payment.process')) }}
                                            <input type="hidden" name="country" value="{{ $country }}" />
                                            <input type="hidden" name="method" value="{{ $method }}" />
                                            <input type="hidden" name="cgv" value="{{ $cgv }}" />
                                            @if ($errors->has('code')) <div class="input-error">{{ $errors->first('code') }}</div> @endif
                                            Entrez votre code : <input type="text" name="code" value="{{ Input::old('code') }}" @if ($errors->has('code')) class="has-error" @endif />
                                            <div class="payment-submit"><input type="submit" value="Valider" /></div>
                                        {{ Form::close() }}
                                    </div>
                                </div>
                            </div>
                            <div class="payment-steps">
                                <ul>
@if ($method == 'audiotel' || $method == 'mobilecall')
                                    <li><span class="step">1</span>Préparez un crayon et une feuille de papier pour noter le <b>code d'accès</b>.</li>
                                    <li><span class="step">2</span>Appelez le numéro de téléphone de votre pays et suivez les instructions.</li>
                                    <li><span class="step">3</span>Notez précisément le code d'accès obtenu, puis raccrochez sans attendre.</li>
                                    <li><span class="step">4</span>Entrez le code dans le formulaire.</li>
                                    <li><span class="step">5</span>Enfin, cliquez sur "<b>Valider</b>".</li>
@elseif ($method == 'sms')
                                    <li><span class="step">1</span>Envoyez le texte au numéro ci-dessus à partir de votre téléphone mobile.</li>
                                    <li><span class="step">2</span>En réponse, vous recevrez un code d'accès.</li>
                                    <li><span class="step">3</span>Entrez le code dans le formulaire.</li>
                                    <li><span class="step">4</span>Enfin, cliquez sur "<b>Valider</b>".</li>
@endif
                                </ul>

                                <p>Vous devez être le propriétaire du téléphone pour utiliser ce service (ou avoir obtenu son autorisation). Les mineurs doivent avoir obtenu l'accord de leurs parents ou représentants légaux avant d'utiliser ce moyen de paiement. Ne conservez pas le numéro de téléphone, il peut changer à tout moment. Vous avez 24h pour utiliser le code d'accès ou le numéro d'ordre. Le coût de l'achat sera reporté sur votre relevé téléphonique.</p>

                                <div class="hr"></div>

                                <p class="legal">Votre paiement au serveur {{ $server_name }} sera assuré par ePayment GmbH. Utiliser un moyen de paiement à l'insu de son propriétaire ou contester indûment un paiement sont des délits sanctionnés dans le monde entier. {{ $server_name }} et ses représentants se réservent le droit de poursuivre tout contrevenant.</p>
                            </div>
                        </div>
                    </div> <!-- shop -->
                </div> <!-- content -->
@stop
