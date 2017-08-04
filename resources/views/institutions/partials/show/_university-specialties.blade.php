<div id="vuzik_2">
    <div class="ui pointing secondary menu">
        <a class="item active" data-tab="first">Специальности</a>
        <a class="item" data-tab="third">Приемная комиссия</a>
    </div>
    <div class="ui tab segment t active" data-tab="first">
        <table class="ui celled padded table">
            <thead>
                <tr>
                    <th class="single line">Специальности Бакалавриата</th>
                    <th>Код</th>
                    <th>Коммерческое отделение</th>
                    <th>Срок обучения</th>
                    <th>Форма обучения</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($institution->specialties as $specialty)
                    @include ('institutions/partials/show/_in_table_specialty', [
                        'model' => $specialty
                    ])
                @endforeach
            </tbody>
        </table>
    </div>
</div>
