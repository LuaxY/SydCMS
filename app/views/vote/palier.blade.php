                        <div class="vote-palier-name">Palier : {{ $palierId }}</div>
                            <div class="vote-progress">
                                <div class="progress-bar" data="{{ $progress }}"></div>
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
@include('vote.object')
