<?php

class TeamTest extends TestCase
{
    public function testTeamList()
    {
        $this->admin();

        $this->json('GET', 'api/teams');
        $this->assertEquals(200, $this->response->status());

        $this->seeJson([
            'data' => [
                ['id' => 1, 'name' => 'Admin', 'email' => 'admin@admin.com']
            ],
            'meta' => [
                'code'    => 200,
                'message' => 'OK',
            ],
        ]);
    }
}
