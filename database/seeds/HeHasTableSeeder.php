<?php

use Illuminate\Database\Seeder;
use App\HeHas;

class HeHasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hehas1 = new HeHas();
        $hehas1->question_id = 1;
        $hehas1->tag_id = 1;
        $hehas1->save();

        $hehas2 = new HeHas();
        $hehas2->question_id = 2;
        $hehas2->tag_id = 2;
        $hehas2->save();

        $hehas3 = new HeHas();
        $hehas3->question_id = 2;
        $hehas3->tag_id = 3;
        $hehas3->save();

        $hehas4 = new HeHas();
        $hehas4->question_id = 2;
        $hehas4->tag_id = 4;
        $hehas4->save();

        $hehas5 = new HeHas();
        $hehas5->question_id = 3;
        $hehas5->tag_id = 5;
        $hehas5->save();

        $hehas6 = new HeHas();
        $hehas6->question_id = 3;
        $hehas6->tag_id = 6;
        $hehas6->save();

        $hehas7 = new HeHas();
        $hehas7->question_id = 3;
        $hehas7->tag_id = 7;
        $hehas7->save();

        $hehas8 = new HeHas();
        $hehas8->question_id = 4;
        $hehas8->tag_id = 7;
        $hehas8->save();

        $hehas9 = new HeHas();
        $hehas9->question_id = 5;
        $hehas9->tag_id = 8;
        $hehas9->save();

        $hehas10 = new HeHas();
        $hehas10->question_id = 5;
        $hehas10->tag_id = 9;
        $hehas10->save();

        $hehas11 = new HeHas();
        $hehas11->question_id = 6;
        $hehas11->tag_id = 10;
        $hehas11->save();

        $hehas12 = new HeHas();
        $hehas12->question_id = 6;
        $hehas12->tag_id = 11;
        $hehas12->save();

        /*
        $hehas13 = new HeHas();
        $hehas13->question_id = 1;
        $hehas13->tag_id = 1;
        $hehas13->save();

        $hehas14 = new HeHas();
        $hehas14->question_id = 1;
        $hehas14->tag_id = 1;
        $hehas14->save();

        $hehas15 = new HeHas();
        $hehas15->question_id = 1;
        $hehas15->tag_id = 1;
        $hehas15->save();

        $hehas16 = new HeHas();
        $hehas16->question_id = 1;
        $hehas16->tag_id = 1;
        $hehas16->save();

        $hehas17 = new HeHas();
        $hehas17->question_id = 1;
        $hehas17->tag_id = 1;
        $hehas17->save();

        $hehas18 = new HeHas();
        $hehas18->question_id = 1;
        $hehas18->tag_id = 1;
        $hehas18->save();

        $hehas19 = new HeHas();
        $hehas19->question_id = 1;
        $hehas19->tag_id = 1;
        $hehas19->save();

        $hehas20 = new HeHas();
        $hehas20->question_id = 1;
        $hehas20->tag_id = 1;
        $hehas20->save();

        $hehas21 = new HeHas();
        $hehas21->question_id = 1;
        $hehas21->tag_id = 1;
        $hehas21->save();

        $hehas22 = new HeHas();
        $hehas22->question_id = 1;
        $hehas22->tag_id = 1;
        $hehas22->save();

        $hehas23 = new HeHas();
        $hehas23->question_id = 1;
        $hehas23->tag_id = 1;
        $hehas23->save();

        $hehas24 = new HeHas();
        $hehas24->question_id = 1;
        $hehas24->tag_id = 1;
        $hehas24->save();

        $hehas25 = new HeHas();
        $hehas25->question_id = 1;
        $hehas25->tag_id = 1;
        $hehas25->save();

        $hehas26 = new HeHas();
        $hehas26->question_id = 1;
        $hehas26->tag_id = 1;
        $hehas26->save();

        $hehas27 = new HeHas();
        $hehas27->question_id = 1;
        $hehas27->tag_id = 1;
        $hehas27->save();

        $hehas28 = new HeHas();
        $hehas28->question_id = 1;
        $hehas28->tag_id = 1;
        $hehas28->save();

        $hehas29 = new HeHas();
        $hehas29->question_id = 1;
        $hehas29->tag_id = 1;
        $hehas29->save();

        $hehas30 = new HeHas();
        $hehas30->question_id = 1;
        $hehas30->tag_id = 1;
        $hehas30->save();

        $hehas31 = new HeHas();
        $hehas31->question_id = 1;
        $hehas31->tag_id = 1;
        $hehas31->save();

        $hehas32 = new HeHas();
        $hehas32->question_id = 1;
        $hehas32->tag_id = 1;
        $hehas32->save();

        $hehas33 = new HeHas();
        $hehas33->question_id = 1;
        $hehas33->tag_id = 1;
        $hehas33->save();

        $hehas34 = new HeHas();
        $hehas34->question_id = 1;
        $hehas34->tag_id = 1;
        $hehas34->save();

        $hehas35 = new HeHas();
        $hehas35->question_id = 1;
        $hehas35->tag_id = 1;
        $hehas35->save();

        $hehas36 = new HeHas();
        $hehas36->question_id = 1;
        $hehas36->tag_id = 1;
        $hehas36->save();

        $hehas37 = new HeHas();
        $hehas37->question_id = 1;
        $hehas37->tag_id = 1;
        $hehas37->save();

        $hehas38 = new HeHas();
        $hehas38->question_id = 1;
        $hehas38->tag_id = 1;
        $hehas38->save();

        $hehas39 = new HeHas();
        $hehas39->question_id = 1;
        $hehas39->tag_id = 1;
        $hehas39->save();

        $hehas40 = new HeHas();
        $hehas40->question_id = 1;
        $hehas40->tag_id = 1;
        $hehas40->save();
        */
    }
}