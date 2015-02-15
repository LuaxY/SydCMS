                            <div class="vote-gift-details vote-block-1">
                                <div class="vote-gift-title-block">
                                    <span class="vote-reward-text">
                                        <span>{{ $reward->step }}</span>
                                        votes
                                    </span>
                                    <div class="vote-gift-title">
                                        <span class="vote-gift-title-next">Cadeau à obtenir :</span>
                                        <span class="vote-gift-title-object">{{ DofusAPI::text($reward->item->NameId) }}</span>
                                    </div>
                                </div>
                                <div class="vote-gift-description-block">
                                    <div class="object-illu left">
                                        <img src="{{ DofusAPI::get('dofus/www/game/items/200/'. $reward->item->IconId .'.png') }}" />
                                    </div>
                                    <div class="vote-gift-description right">
                                        <div class="title">
                                            <span class="picto"></span>
                                            Description
                                        </div>
                                        <p>{{ DofusAPI::text($reward->item->DescriptionId) }}</p>
                                    </div>
                                </div>
                            </div>
