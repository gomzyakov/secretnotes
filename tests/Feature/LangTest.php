<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class LangTest extends TestCase
{
    public function test_en_lang()
    {
        $response = $this->get('/lang/en');

        $response->assertStatus(302);

        $this->assertSame('en', Session::get('locale'));
    }

    public function test_ru_lang()
    {
        $response = $this->get('/lang/ru');

        $response->assertStatus(302);

        $this->assertSame('ru', Session::get('locale'));
    }

    /**
     * Локаль остаётся без изменений, если параметр не передан.
     */
    public function test_missing_parameter()
    {
        $current_locale = Session::get('locale');

        $response = $this->get('/lang');

        $response->assertStatus(302);

        $this->assertSame($current_locale, Session::get('locale'));
    }

    /**
     * Локаль остаётся без изменений, если параметр не входит в перечень допустимых.
     */
    public function test_incorrect_parameter()
    {
        $current_locale = Session::get('locale');

        $response = $this->get('/lang/foo');

        $response->assertStatus(302);

        $this->assertSame($current_locale, Session::get('locale'));
    }
}
