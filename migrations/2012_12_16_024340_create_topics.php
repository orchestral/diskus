<?php

use Diskus\Model\Topic;

class Diskus_Create_Topics {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('diskus_topics', function ($table)
		{
			$table->increments('id');
			
			$table->integer('user_id')->unsigned();
			$table->string('title')->nullable();
			$table->text('content')->nullable();
			$table->blob('meta')->nullable();
			$table->boolean('answer')->default(Topic::NOT_ANSWERED);
			$table->string('status')->default(Topic::STATUS_PUBLISH);

			$table->timestamps();

			$table->index('user_id');
			$table->index('answer');
			$table->index('status');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('diskus_topics');
	}

}