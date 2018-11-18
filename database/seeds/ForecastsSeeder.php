<?php

use Illuminate\Database\Seeder;

class ForecastsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $forecasts = [
            '2018-12-01' => [
                '1' => 'В первой половине декабря Козерогам, вероятно, придется пересматривать некоторые свои стратегические цели и задачи. Возможно, вы станете испытывать неудовлетворенность тем, какое социальное и профессиональное положение имеете в обществе. Анализ ситуации может привести вас к мысли о пересмотре некоторых прежних приоритетов. В результате такой работы над ошибками, вы можете ставить перед собой более реалистичные задачи. Возможно, в эти дни вам предложат вернуться на то место работы, где вы раньше трудились. Вас могут восстановить на ранее занимаемой должности. Вторая половина месяца связана с активизацией тайных недоброжелателей. Вокруг вас могут витать всевозможные слухи и сплетни, которые лучше игнорировать, дабы не расходовать нервную систему на всякие неприятности. Крайне нежелательно вступать в доверительные отношения со случайными попутчиками. Потому что, как говорил поэт, нам не дано предугадать, как наше слово отзовется. Помните, что нечестные люди могут использовать ваши слова против вас же. Наиболее удачные дни в декабре: 1, 9, 15, 16, 27, 28. Напряженные дни: 3, 6, 13, 20, 22, 23.'
            ],
            '2018-11-12' => [
                '2' => 'У Козерогов в начале и середине недели могут вырасти финансовые возможности. Вы сможете заработать больше денег, либо деньги откуда-то еще придут к вам – в любом случае у вас появится возможность купить те вещи, о которых вы мечтали. Особенно это относится к покупкам для дома. Например, можно купить осветительный прибор, люстру в квартиру. Также это хорошее время для улучшения жилищных условий, чтобы сделать свою жизнь более уютной и комфортной. И отношения в семье в эти дни складываются теплые и доброжелательные. Вторая половина недели неблагоприятна для коротких поездок и знакомств. Звезды советуют деликатнее общаться с окружающими людьми. Возможно, вы окажетесь в плену собственных заблуждений, и будете подозревать некоторых людей в нечестном к вам отношении. Отчасти это будет соответствовать действительности, однако вы сами будете склонны «накручивать» лишнего негатива. В случае бессонницы, делайте прогулки по вечерам на свежем воздухе и воздерживайтесь от употребления снотворного.'
            ],
            '2018-11-17' => [
                '3' => 'Днем у Козерогов будет время, чтобы попрактиковаться в искусстве поддерживать баланс, уходить от лишних вопросов и угадывать по неприметным признакам чужой настрой. Можно позволить себе помечтать, взять паузу, взвесить варианты. В конце дня вам потребуются выдержка и организованность, даже если вы находитесь у себя дома. Сделав ставку на чистое вдохновение и счастливый случай, вы можете проиграть.'
            ],
        ];

        foreach ( $forecasts as $date => $forec ) {

            foreach ($forec as $type => $forecast) {

                DB::table('forecasts')->insert([
                    'zodiac_id' => 10,
                    'text' => $forecast,
                    'date' => $date,
                    'forecasts_type_id' => $type,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ]);

            }
        }
    }
}
