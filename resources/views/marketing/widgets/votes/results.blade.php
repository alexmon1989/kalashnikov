<div class="row">
    <div class="col-md-12">
        <div class="headline">
            <h2>Опрос</h2>
            <a name="votes"></a>
        </div>

        <h3 class="heading-sm">{{ $vote->question }}</h3>

        @foreach($answers as $answer)
        <h3 class="heading-xs">{{ $answer->answer }} <span class="pull-right">{{ round(($answer->count*100)/$count, 1) }}%</span></h3>
        <div class="progress progress-u progress-sm">
            <div style="width: {{ round(($answer->count*100)/$count, 1) }}%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="{{ round(($answer->count*100)/$count, 1) }}" role="progressbar" class="progress-bar progress-bar-u">
            </div>
        </div>
        @endforeach

        <p><strong>Всего проголосовало: {{ $count }}</strong></p>
    </div>
</div>
