<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sitesettings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->string('type');
            $table->tinyInteger('group');
            $table->string('value');
            $table->timestamps();
        });

        DB::table('sitesettings')->insert(array('name'                 => 'APP NAME',
                                                'type'                 => 'text',
                                                'group'                 => '1',
                                                'value'                => 'market',
                                                'slug'                 => str_slug('APPNAME'),
                                                'created_at'           => date('Y-m-d h-i-s'),
                                                'updated_at'           => date('Y-m-d h-i-s')));

        DB::table('sitesettings')->insert(array('name'                 => 'APP ENV',
                                                'type'                 => 'text',
                                                'group'                 => '1',
                                                'value'                => 'production',
                                                'slug'                 => str_slug('APPENV'),
                                                'created_at'           => date('Y-m-d h-i-s'),
                                                'updated_at'           => date('Y-m-d h-i-s')));

        DB::table('sitesettings')->insert(array('name'                 => 'APP DEBUG',
                                                'type'                 => 'selectappdebug',
                                                'group'                 => '1',
                                                'value'                => 'true',
                                                'slug'                 => str_slug('APPDEBUG'),
                                                'created_at'           => date('Y-m-d h-i-s'),
                                                'updated_at'           => date('Y-m-d h-i-s')));

        DB::table('sitesettings')->insert(array('name'                 => 'APP URL',
                                                'type'                 => 'url',
                                                'group'                 => '1',
                                                'value'                => 'http://localhost',
                                                'slug'                 => str_slug('APPURL'),
                                                'created_at'           => date('Y-m-d h-i-s'),
                                                'updated_at'           => date('Y-m-d h-i-s')));

        DB::table('sitesettings')->insert(array('name'                 => 'Timezone',
                                                'type'                 => 'selecttimezone',
                                                'group'                 => '1',
                                                'value'                => 'UTC',
                                                'slug'                 => str_slug('timezone'),
                                                'created_at'           => date('Y-m-d h-i-s'),
                                                'updated_at'           => date('Y-m-d h-i-s')));

        DB::table('sitesettings')->insert(array('name'                 => 'MAILGUN DOMAIN',
                                                'type'                 => 'text',
                                                'group'                 => '1',
                                                'value'                => 'UTC',
                                                'slug'                 => str_slug('MAILGUNDOMAIN'),
                                                'created_at'           => date('Y-m-d h-i-s'),
                                                'updated_at'           => date('Y-m-d h-i-s')));

        DB::table('sitesettings')->insert(array('name'                 => 'MAILGUN SECRET',
                                                'type'                 => 'text',
                                                'group'                 => '1',
                                                'value'                => 'UTC',
                                                'slug'                 => str_slug('MAILGUNSECRET'),
                                                'created_at'           => date('Y-m-d h-i-s'),
                                                'updated_at'           => date('Y-m-d h-i-s')));

        DB::table('sitesettings')->insert(array('name'                 => 'Country',
                                                'type'                 => 'selectcountry',
                                                'group'                 => '1',
                                                'value'                => 'Egypt',
                                                'slug'                 => str_slug('Country'),
                                                'created_at'           => date('Y-m-d h-i-s'),
                                                'updated_at'           => date('Y-m-d h-i-s')));

        DB::table('sitesettings')->insert(array('name'                 => 'Copyright',
                                                'type'                 => 'url',
                                                'group'                 => '1',
                                                'value'                => 'http://www.4serv.net',
                                                'slug'                 => str_slug('Copyright'),
                                                'created_at'           => date('Y-m-d h-i-s'),
                                                'updated_at'           => date('Y-m-d h-i-s')));





        DB::table('sitesettings')->insert(array('name'                 => 'Facebook',
                                                'type'                 => 'url',
                                                'group'                 => '2',
                                                'value'                => 'http://www.facebook.com',
                                                'slug'                 => str_slug('Facebook'),
                                                'created_at'           => date('Y-m-d h-i-s'),
                                                'updated_at'           => date('Y-m-d h-i-s')));

        DB::table('sitesettings')->insert(array('name'                 => 'Twitter',
                                                'type'                 => 'url',
                                                'group'                 => '2',
                                                'value'                => 'http://www.twitter.com',
                                                'slug'                 => str_slug('Twitter'),
                                                'created_at'           => date('Y-m-d h-i-s'),
                                                'updated_at'           => date('Y-m-d h-i-s')));

        DB::table('sitesettings')->insert(array('name'                 => 'Flickr',
                                                'type'                 => 'url',
                                                'group'                 => '2',
                                                'value'                => 'https://www.flickr.com/',
                                                'slug'                 => str_slug('Flickr'),
                                                'created_at'           => date('Y-m-d h-i-s'),
                                                'updated_at'           => date('Y-m-d h-i-s')));

        DB::table('sitesettings')->insert(array('name'                 => 'Tumblr',
                                                'type'                 => 'url',
                                                'group'                 => '2',
                                                'value'                => 'https://www.tumblr.com/',
                                                'slug'                 => str_slug('Tumblr'),
                                                'created_at'           => date('Y-m-d h-i-s'),
                                                'updated_at'           => date('Y-m-d h-i-s')));

        DB::table('sitesettings')->insert(array('name'                 => 'Linkedin',
                                                'type'                 => 'url',
                                                'group'                 => '2',
                                                'value'                => 'http://www.linkedin.com',
                                                'slug'                 => str_slug('Linkedin'),
                                                'created_at'           => date('Y-m-d h-i-s'),
                                                'updated_at'           => date('Y-m-d h-i-s')));

        DB::table('sitesettings')->insert(array('name'                 => 'Instagram',
                                                'type'                 => 'url',
                                                'group'                 => '2',
                                                'value'                => 'https://instagram.com/accounts/login/',
                                                'slug'                 => str_slug('Instagram'),
                                                'created_at'           => date('Y-m-d h-i-s'),
                                                'updated_at'           => date('Y-m-d h-i-s')));








        DB::table('sitesettings')->insert(array('name'                 => 'mail mode',
                                                'type'                 => 'selectmailmode',
                                                'group'                 => '3',
                                                'value'                => 'on',
                                                'slug'                 => str_slug('mailmode'),
                                                'created_at'           => date('Y-m-d h-i-s'),
                                                'updated_at'           => date('Y-m-d h-i-s')));

        DB::table('sitesettings')->insert(array('name'                 => 'MAIL DRIVER',
                                                'type'                 => 'text',
                                                'group'                 => '3',
                                                'value'                => 'smtp',
                                                'slug'                 => str_slug('MAILDRIVER'),
                                                'created_at'           => date('Y-m-d h-i-s'),
                                                'updated_at'           => date('Y-m-d h-i-s')));

        DB::table('sitesettings')->insert(array('name'                 => 'MAIL HOST',
                                                'type'                 => 'text',
                                                'group'                 => '3',
                                                'value'                => 'mailtrap.io',
                                                'slug'                 => str_slug('MAILHOST'),
                                                'created_at'           => date('Y-m-d h-i-s'),
                                                'updated_at'           => date('Y-m-d h-i-s')));

        DB::table('sitesettings')->insert(array('name'                 => 'MAIL PORT',
                                                'type'                 => 'text',
                                                'group'                 => '3',
                                                'value'                => '2525',
                                                'slug'                 => str_slug('MAILPORT'),
                                                'created_at'           => date('Y-m-d h-i-s'),
                                                'updated_at'           => date('Y-m-d h-i-s')));

        DB::table('sitesettings')->insert(array('name'                 => 'MAIL USERNAME',
                                                'type'                 => 'text',
                                                'group'                 => '3',
                                                'value'                => '2288d833f0c2db',
                                                'slug'                 => str_slug('MAILUSERNAME'),
                                                'created_at'           => date('Y-m-d h-i-s'),
                                                'updated_at'           => date('Y-m-d h-i-s')));

        DB::table('sitesettings')->insert(array('name'                 => 'MAIL PASSWORD',
                                                'type'                 => 'text',
                                                'group'                 => '3',
                                                'value'                => '6d826fb047387c',
                                                'slug'                 => str_slug('MAILPASSWORD'),
                                                'created_at'           => date('Y-m-d h-i-s'),
                                                'updated_at'           => date('Y-m-d h-i-s')));

        DB::table('sitesettings')->insert(array('name'                 => 'MAIL ENCRYPTION',
                                                'type'                 => 'text',
                                                'group'                 => '3',
                                                'value'                => 'tls',
                                                'slug'                 => str_slug('MAILENCRYPTION'),
                                                'created_at'           => date('Y-m-d h-i-s'),
                                                'updated_at'           => date('Y-m-d h-i-s')));






        DB::table('sitesettings')->insert(array('name'                 => 'Stripe Mode',
                                                'type'                 => 'selectstripemode',
                                                'group'                 => '4',
                                                'value'                => 'UTC',
                                                'slug'                 => str_slug('StripeMode'),
                                                'created_at'           => date('Y-m-d h-i-s'),
                                                'updated_at'           => date('Y-m-d h-i-s')));


        DB::table('sitesettings')->insert(array('name'                 => 'STRIPE KEY',
                                                'type'                 => 'text',
                                                'group'                 => '4',
                                                'value'                => 'UTC',
                                                'slug'                 => str_slug('STRIPEKEY'),
                                                'created_at'           => date('Y-m-d h-i-s'),
                                                'updated_at'           => date('Y-m-d h-i-s')));

        DB::table('sitesettings')->insert(array('name'                 => 'STRIPE SECRET',
                                                'type'                 => 'text',
                                                'group'                 => '4',
                                                'value'                => 'UTC',
                                                'slug'                 => str_slug('STRIPESECRET'),
                                                'created_at'           => date('Y-m-d h-i-s'),
                                                'updated_at'           => date('Y-m-d h-i-s')));


        DB::table('sitesettings')->insert(array('name'                 => 'Paypal Mode',
                                                'type'                 => 'selectpaypalmode',
                                                'group'                 => '4',
                                                'value'                => 'UTC',
                                                'slug'                 => str_slug('paypalmode'),
                                                'created_at'           => date('Y-m-d h-i-s'),
                                                'updated_at'           => date('Y-m-d h-i-s')));


        DB::table('sitesettings')->insert(array('name'                 => 'Client Id',
                                                'type'                 => 'text',
                                                'group'                 => '4',
                                                'value'                => 'UTC',
                                                'slug'                 => str_slug('ClientId'),
                                                'created_at'           => date('Y-m-d h-i-s'),
                                                'updated_at'           => date('Y-m-d h-i-s')));

        DB::table('sitesettings')->insert(array('name'                 => 'Secret',
                                                'type'                 => 'text',
                                                'group'                 => '4',
                                                'value'                => 'UTC',
                                                'slug'                 => str_slug('Secret'),
                                                'created_at'           => date('Y-m-d h-i-s'),
                                                'updated_at'           => date('Y-m-d h-i-s')));



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sitesettings');
    }
}
