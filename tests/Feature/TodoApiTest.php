<?php

namespace Tests\Feature;

use Tests\TestCase;

class TodoApiTest extends TestCase
{
    public function testListTodos()
    {
        $response = $this->json('GET', 'http://FinT-Backend-Coding-Challenge.mw/api/todos');
        $response->assertStatus(200)->assertJson([]);
    }

    public function testCreateTodo()
    {
        $response = $this->json('POST', 'http://FinT-Backend-Coding-Challenge.mw/api/todos', [
            'name'   => 'Create TODO_entry with PHPUnit testing...',
            'status' => 'incomplete',
        ]);
        $response->assertStatus(200);
        return (int) $response->decodeResponseJson('id');
    }

    /**
     * @param int $id
     * @depends testCreateTodo
     */
    public function testReadTodo(int $id)
    {
        $response = $this->json('GET', "http://FinT-Backend-Coding-Challenge.mw/api/todos/{$id}");
        $response->assertStatus(200);
    }

    /**
     * @param int $id
     * @depends testCreateTodo
     */
    public function testUpdateTodo(int $id)
    {
        $response = $this->json('PUT', "http://FinT-Backend-Coding-Challenge.mw/api/todos/$id", [
            'name'   => 'Update and complete TODO_entry with PHPUnit.',
            'status' => 'complete',
        ]);
        $response->assertStatus(200);
    }

    /**
     * @param int $id
     * @depends testCreateTodo
     */
    public function testDeleteTodo(int $id)
    {
        $response = $this->json('DELETE', "http://FinT-Backend-Coding-Challenge.mw/api/todos/$id");
        $response->assertStatus(200);
    }
}
