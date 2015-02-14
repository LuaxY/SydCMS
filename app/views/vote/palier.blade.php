                        <div class="vote-palier-name">Palier : {{ $palierId }}</div>
                            <div class="vote-progress">
                                <div class="progress-bar" style="width: {{ $progress }}%"></div>
                            </div>
                            <div class="vote-time-line">
                                <div class="vote-reward vote-block-1">
                                    <span class="arrow"></span>
                                    <a href="" class="selected">
                                        <span class="vote-reward-text">
                                            <span>{{ 50 * ($palierId - 1) + 10 }}</span>
                                            votes
                                        </span>
                                        <span class="vote-reward-icon"></span>
                                    </a>
                                </div>
                                <div class="vote-reward vote-block-2">
                                    <span class="arrow"></span>
                                    <a href="">
                                        <span class="vote-reward-text">
                                            <span>{{ 50 * ($palierId - 1) + 20 }}</span>
                                            votes
                                        </span>
                                        <span class="vote-reward-icon"></span>
                                    </a>
                                </div>
                                <div class="vote-reward vote-block-3">
                                    <span class="arrow"></span>
                                    <a href="">
                                        <span class="vote-reward-text">
                                            <span>{{ 50 * ($palierId - 1) + 30 }}</span>
                                            votes
                                        </span>
                                        <span class="vote-reward-icon"></span>
                                    </a>
                                </div>
                                <div class="vote-reward vote-block-4">
                                    <span class="arrow"></span>
                                    <a href="">
                                        <span class="vote-reward-text">
                                            <span>{{ 50 * ($palierId - 1) + 40 }}</span>
                                            votes
                                        </span>
                                        <span class="vote-reward-icon"></span>
                                    </a>
                                </div>
                                <div class="vote-reward vote-block-5">
                                    <span class="arrow"></span>
                                    <a href="">
                                        <span class="vote-reward-text">
                                            <span>{{ 50 * ($palierId - 1) + 50 }}</span>
                                            votes
                                        </span>
                                        <span class="vote-reward-icon big"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="vote-gift-details vote-block-1">
                                <div class="vote-gift-title-block">
                                    <span class="vote-reward-text">
                                        <span>10</span>
                                        votes
                                    </span>
                                    <div class="vote-gift-title">
                                        <span class="vote-gift-title-next">Cadeau à obtenir :</span>
                                        <span class="vote-gift-title-object">Object</span>
                                    </div>
                                </div>
                                <div class="vote-gift-description-block">
                                    <div class="object-illu left">
                                        <img src="{{ DofusAPI::get('/forge/dofus/www/game/items/200/16437.png') }}" />
                                    </div>
                                    <div class="vote-gift-description right">
                                        <div class="title">
                                            <span class="picto"></span>
                                            Description
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In iaculis elementum elit, a condimentum dui convallis et. Sed aliquam aliquet libero, non iaculis ante venenatis dignissim. Curabitur eu felis ac eros auctor auctor quis ut est.</p>
                                    </div>
                                </div>
                            </div>
