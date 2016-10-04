<?php

use App\Category;

class TeamTest extends TestCase
{
    public function testTeamList()
    {
        $this->admin();

        $this->json('GET', 'api/teams');
        $this->assertEquals(200, $this->response->status());

        $this->seeJson([
            'data' => [
                ['email' => 'admin@admin.com', 'id' => 1, 'name' => 'Admin']
            ],
            'meta' => [
                'code'    => 200,
                'message' => 'OK',
                'pagination' => [
                    'count'   => 1,
                    'current_page' => 1,
                    'links'     => [],
                    'per_page' => 15,
                    'total'    => 1,
                    'total_pages' => 1,
                ]
            ],
        ]);
    }

    public function testCreateTeam()
    {
        $this->admin();

        $this->json('POST', 'api/teams/', [
            'name' => 'asdsadsadsa',
            'email' => 'asdsada@mamil.com',
            'password' => 'asdsada',
            'role' => '',
            'location' => '',
            'website' => '',
            'facebook_profile' => '',
            'twitter_profile' => '',
            'bio' => '',
            'accessibility' => '',
            'status' => '',
            'language' => '',
            'visibility' => '',
            'meta_title' => '',
            'meta_description' => '',
            'confirm_token' => '',
            'confirm_at' => '',
            'updated_at' => '',
            'created_by' => '',
            'updated_by' => ''
        ]);

        $this->assertEquals(200, $this->response->status());

        $this->seeInDatabase('users', [
            'name' => 'asdsadsadsa',
            'email' => 'asdsada@mamil.com',
            'password' => 'asdsada'
        ]);

        $this->seeJson([
            'data' => [
                'email' => 'asdsada@mamil.com',
                'id' => 2,
                'name' => 'asdsadsadsa'
            ],
            'meta' => [
                'code' => 200,
                'message' => 'OK'
            ]
        ]);
    }

    public function testUpdateTeam()
    {
        $this->admin();

        $this->json('POST', 'api/teams/', [
            'name' => 'asdsadsadsa',
            'email' => 'asdsada@mamil.com',
            'password' => 'asdsada',
            'location' => 'somewhere',
            'website' => 'www.test.com',
            'bio' => 'myself and i',
            'status' => 'active'
        ]);

        $this->assertEquals(200, $this->response->status());

         $this->seeJson([
            'data' => [
                'email' => 'asdsada@mamil.com',
                'id' => 2,
                'name' => 'asdsadsadsa'
            ],
            'meta' => [
                'code' => 200,
                'message' => 'OK'
            ]
        ]);
    }

    public function testShowTeam()
    {
        $this->admin();

         $this->json('POST', 'api/teams/', [
            'name' => 'asdsadsadsa',
            'email' => 'asdsada@mamil.com',
            'password' => 'asdsada',
            'location' => 'somewhere',
            'website' => 'www.test.com',
            'bio' => 'myself and i',
            'status' => 'active'
        ]);

        $this->assertEquals(200, $this->response->status());

        $this->json('PUT', 'api/teams/2', [
            'name' => 'asdsadsadsa',
            'email' => 'asdsada@mamil.com',
            'password' => 'asdsada',
            'location' => 'somewhere',
            'website' => 'www.test.com',
            'bio' => 'myself and i',
            'status' => 'active'
        ]);

        $this->seeJson([
            'data' => [
                'name' => 'asdsadsadsa',
                'id'    => 2,
                'email' => 'asdsada@mamil.com'
            ],
           'meta' => [
                'code'    => 200,
                'message' => 'OK',
            ]
        ]);
    }

    public function testDeleteTeam()
    {
        $this->admin();

         $this->json('POST', 'api/teams/', [
            'id'   => 2,
            'name' => 'asdsadsadsa',
            'email' => 'asdsada@mamil.com',
            'password' => 'asdsada',
            'location' => 'somewhere',
            'website' => 'www.test.com',
            'bio' => 'myself and i',
            'status' => 'active'
        ]);

        $this->json('DELETE', '/api/teams/2');
        $this->assertEquals(200, $this->response->status());

        $this->seeJson([
            'meta' => [
                'code'    => 200,
                'message' => 'OK',
            ],
        ]);

        $this->notSeeInDatabase('users', [
            'name' => 'asdsadsadsa',
            'email' => 'asdsada@mamil.com'
        ]);
    }
}
