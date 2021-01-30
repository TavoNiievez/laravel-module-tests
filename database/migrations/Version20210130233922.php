<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;
use LaravelDoctrine\Migrations\Schema\Builder;
use LaravelDoctrine\Migrations\Schema\Table;

class Version20210130233922 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $builder = new Builder($schema);
        $builder->create('failed_jobs', function (Table $table) {
            $table->index('id');
            $table->string('uuid');
            $table->unique('uuid');
            $table->text('connection');
            $table->text('queue');
            $table->text('payload');
            $table->text('exception');
            $table->timestamp('failed_at');
        });
    }

    public function down(Schema $schema): void
    {
        $schema->dropTable('failed_jobs');
    }
}
