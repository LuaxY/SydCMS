                        <div class="vote-palier-name">Palier : {{ $palierId }}</div>
                            <div class="vote-progress">
                                <div class="progress-bar" data="{{ $progress }}"></div>
                            </div>
                            <div class="vote-time-line">
@foreach ($steps as $i => $step)
                                <div class="vote-reward vote-block-{{ $i }}" item="{{ $step->itemId }}" step="{{ $i }}" votes="{{ $step->votes }}">
                                    <span class="arrow"></span>
                                    <div class="vote-reward-step @if ($current == $i) selected @endif">
                                        <span class="vote-reward-text">
                                            <span>{{ $step->votes }}</span>
                                            votes
                                        </span>
                                        <span class="vote-reward-icon"></span>
                                    </div>
                                </div>
@endforeach
                            </div>
                            <div class="vote-item mask-relative masked">
@include('vote.object')
                                <div class="loadmask" style="display: block;"></div>
                                <div class="loading" style="display: block; top: 100px;"></div>
                            </div>
                            <div id="load-item" item="{{ $steps[$current]->itemId }}" step="{{ $current }}" votes="{{ $steps[$current]->votes }}"></div>
