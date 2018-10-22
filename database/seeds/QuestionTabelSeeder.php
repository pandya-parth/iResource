<?php

use Illuminate\Database\Seeder;
use App\Department;

class QuestionTabelSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
	DB::table('questions')->insert([
		'department_id' => Department::first()->id,
		'question' => 'Are you comfortable making cold calls?',
		'a' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'b' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'c' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'd' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'more_info' => 'https://www.thebalancecareers.com/sales-interview-questions-and-answers-2063469',
		'answer' => 'a',
		'created_at' => '2018-07-16 05:48:24',
		'updated_at' => '2018-07-16 05:48:24',
	]);

	DB::table('questions')->insert([
		'department_id' => Department::first()->id,
		'question' => 'Have you consistently met your sales goals?',
		'a' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'b' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'c' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'd' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'more_info' => 'https://www.thebalancecareers.com/sales-interview-questions-and-answers-2063469',
		'answer' => 'a',
		'created_at' => '2018-07-16 05:48:24',
		'updated_at' => '2018-07-16 05:48:24',
	]);

	DB::table('questions')->insert([
		'department_id' => Department::first()->id,
		'question' => 'Do you prefer a long or short sales cycle?',
		'a' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'b' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'c' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'd' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'more_info' => 'https://www.thebalancecareers.com/sales-interview-questions-and-answers-2063469',
		'answer' => 'a',
		'created_at' => '2018-07-16 05:48:24',
		'updated_at' => '2018-07-16 05:48:24',
	]);

	DB::table('questions')->insert([
		'department_id' => Department::first()->id,
		'question' => 'How did you land your most successful sale?',
		'a' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'b' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'c' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'd' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'more_info' => 'https://www.thebalancecareers.com/sales-interview-questions-and-answers-2063469',
		'answer' => 'a',
		'created_at' => '2018-07-16 05:48:24',
		'updated_at' => '2018-07-16 05:48:24',
	]);

	DB::table('questions')->insert([
		'department_id' => Department::first()->id,
		'question' => 'How would your colleagues describe you?',
		'a' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'b' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'c' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'd' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'more_info' => 'https://www.thebalancecareers.com/sales-interview-questions-and-answers-2063469',
		'answer' => 'a',
		'created_at' => '2018-07-16 05:48:24',
		'updated_at' => '2018-07-16 05:48:24',
	]);

	DB::table('questions')->insert([
		'department_id' => Department::first()->id,
		'question' => 'How would your (former) supervisor describe you?',
		'a' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'b' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'c' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'd' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'more_info' => 'https://www.thebalancecareers.com/sales-interview-questions-and-answers-2063469',
		'answer' => 'a',
		'created_at' => '2018-07-16 05:48:24',
		'updated_at' => '2018-07-16 05:48:24',
	]);

	DB::table('questions')->insert([
		'department_id' => Department::first()->id,
		'question' => 'Sell me this pen',
		'a' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'b' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'c' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'd' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'more_info' => 'https://www.thebalancecareers.com/sales-interview-questions-and-answers-2063469',
		'answer' => 'a',
		'created_at' => '2018-07-16 05:48:24',
		'updated_at' => '2018-07-16 05:48:24',
	]);

	DB::table('questions')->insert([
		'department_id' => Department::first()->id,
		'question' => 'What are your long-term career goals?',
		'a' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'b' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'c' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'd' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'more_info' => 'https://www.thebalancecareers.com/sales-interview-questions-and-answers-2063469',
		'answer' => 'a',
		'created_at' => '2018-07-16 05:48:24',
		'updated_at' => '2018-07-16 05:48:24',
	]);

	DB::table('questions')->insert([
		'department_id' => Department::first()->id,
		'question' => 'What are your strengths and weaknesses?',
		'a' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'b' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'c' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'd' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'more_info' => 'https://www.thebalancecareers.com/sales-interview-questions-and-answers-2063469',
		'answer' => 'a',
		'created_at' => '2018-07-16 05:48:24',
		'updated_at' => '2018-07-16 05:48:24',
	]);

	DB::table('questions')->insert([
		'department_id' => Department::first()->id,
		'question' => 'What do you find most rewarding about being in sales?',
		'a' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'b' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'c' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'd' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'more_info' => 'https://www.thebalancecareers.com/sales-interview-questions-and-answers-2063469',
		'answer' => 'a',
		'created_at' => '2018-07-16 05:48:24',
		'updated_at' => '2018-07-16 05:48:24',
	]);

	DB::table('questions')->insert([
		'department_id' => Department::first()->id,
		'question' => 'What do you know about this company?',
		'a' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'b' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'c' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'd' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'more_info' => 'https://www.thebalancecareers.com/sales-interview-questions-and-answers-2063469',
		'answer' => 'a',
		'created_at' => '2018-07-16 05:48:24',
		'updated_at' => '2018-07-16 05:48:24',
	]);

	DB::table('questions')->insert([
		'department_id' => Department::first()->id,
		'question' => 'What interests you most about this sales position?',
		'a' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'b' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'c' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'd' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'more_info' => 'https://www.thebalancecareers.com/sales-interview-questions-and-answers-2063469',
		'answer' => 'a',
		'created_at' => '2018-07-16 05:48:24',
		'updated_at' => '2018-07-16 05:48:24',
	]);

	DB::table('questions')->insert([
		'department_id' => Department::first()->id,
		'question' => 'What makes you a good sales person?',
		'a' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'b' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'c' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'd' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'more_info' => 'https://www.thebalancecareers.com/sales-interview-questions-and-answers-2063469',
		'answer' => 'a',
		'created_at' => '2018-07-16 05:48:24',
		'updated_at' => '2018-07-16 05:48:24',
	]);

	DB::table('questions')->insert([
		'department_id' => Department::first()->id,
		'question' => 'What motivates you?',
		'a' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'b' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'c' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'd' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
		'more_info' => 'https://www.thebalancecareers.com/sales-interview-questions-and-answers-2063469',
		'answer' => 'a',
		'created_at' => '2018-07-16 05:48:24',
		'updated_at' => '2018-07-16 05:48:24',
	]);

	DB::table('questions')->insert([
		'department_id' => Department::first()->id,
		'question' => 'What are the different phases of an IT Project?',
		'a' => 'Lorem Ipsum is simply dummy text of the printing',
		'b' => 'Lorem Ipsum is simply dummy text of the printing',
		'c' => 'Lorem Ipsum is simply dummy text of the printing',
		'd' => 'Lorem Ipsum is simply dummy text of the printing',
		'more_info' => 'http://www.upworktestanswers.com/odesk-test-answers/miscellaneous-certifications/business-writing-skills-certification-answers-2015.html',
		'answer' => 'a',
		'created_at' => '2018-07-16 05:48:24',
		'updated_at' => '2018-07-16 05:48:24',
	]);

DB::table('questions')->insert([
		'department_id' => Department::first()->id,
		'question' => 'What are the tasks and responsibilities of project manager?',
		'a' => 'Lorem Ipsum is simply dummy text of the printing',
		'b' => 'Lorem Ipsum is simply dummy text of the printing',
		'c' => 'Lorem Ipsum is simply dummy text of the printing',
		'd' => 'Lorem Ipsum is simply dummy text of the printing',
		'more_info' => 'http://www.upworktestanswers.com/odesk-test-answers/miscellaneous-certifications/business-writing-skills-certification-answers-2015.html',
		'answer' => 'a',
		'created_at' => '2018-07-16 05:48:24',
		'updated_at' => '2018-07-16 05:48:24',
	]);

DB::table('questions')->insert([
		'department_id' => Department::first()->id,
		'question' => 'List various components of strategy analysis.',
		'a' => 'Lorem Ipsum is simply dummy text of the printing',
		'b' => 'Lorem Ipsum is simply dummy text of the printing',
		'c' => 'Lorem Ipsum is simply dummy text of the printing',
		'd' => 'Lorem Ipsum is simply dummy text of the printing',
		'more_info' => 'http://www.upworktestanswers.com/odesk-test-answers/miscellaneous-certifications/business-writing-skills-certification-answers-2015.html',
		'answer' => 'a',
		'created_at' => '2018-07-16 05:48:24',
		'updated_at' => '2018-07-16 05:48:24',
	]);

DB::table('questions')->insert([
		'department_id' => Department::first()->id,
		'question' => 'List various software engineering processes.',
		'a' => 'Lorem Ipsum is simply dummy text of the printing',
		'b' => 'Lorem Ipsum is simply dummy text of the printing',
		'c' => 'Lorem Ipsum is simply dummy text of the printing',
		'd' => 'Lorem Ipsum is simply dummy text of the printing',
		'more_info' => 'http://www.upworktestanswers.com/odesk-test-answers/miscellaneous-certifications/business-writing-skills-certification-answers-2015.html',
		'answer' => 'a',
		'created_at' => '2018-07-16 05:48:24',
		'updated_at' => '2018-07-16 05:48:24',
	]);

DB::table('questions')->insert([
		'department_id' => Department::first()->id,
		'question' => 'List the components of Requirements Work Plan',
		'a' => 'Lorem Ipsum is simply dummy text of the printing',
		'b' => 'Lorem Ipsum is simply dummy text of the printing',
		'c' => 'Lorem Ipsum is simply dummy text of the printing',
		'd' => 'Lorem Ipsum is simply dummy text of the printing',
		'more_info' => 'http://www.upworktestanswers.com/odesk-test-answers/miscellaneous-certifications/business-writing-skills-certification-answers-2015.html',
		'answer' => 'a',
		'created_at' => '2018-07-16 05:48:24',
		'updated_at' => '2018-07-16 05:48:24',
	]);

DB::table('questions')->insert([
		'department_id' => Department::first()->id,
		'question' => 'What are the initial steps involved in Product development?',
		'a' => 'Lorem Ipsum is simply dummy text of the printing',
		'b' => 'Lorem Ipsum is simply dummy text of the printing',
		'c' => 'Lorem Ipsum is simply dummy text of the printing',
		'd' => 'Lorem Ipsum is simply dummy text of the printing',
		'more_info' => 'http://www.upworktestanswers.com/odesk-test-answers/miscellaneous-certifications/business-writing-skills-certification-answers-2015.html',
		'answer' => 'a',
		'created_at' => '2018-07-16 05:48:24',
		'updated_at' => '2018-07-16 05:48:24',
	]);

DB::table('questions')->insert([
		'department_id' => Department::first()->id,
		'question' => 'What are the different tools used in business analysis?',
		'a' => 'Lorem Ipsum is simply dummy text of the printing',
		'b' => 'Lorem Ipsum is simply dummy text of the printing',
		'c' => 'Lorem Ipsum is simply dummy text of the printing',
		'd' => 'Lorem Ipsum is simply dummy text of the printing',
		'more_info' => 'http://www.upworktestanswers.com/odesk-test-answers/miscellaneous-certifications/business-writing-skills-certification-answers-2015.html',
		'answer' => 'a',
		'created_at' => '2018-07-16 05:48:24',
		'updated_at' => '2018-07-16 05:48:24',
	]);

DB::table('questions')->insert([
		'department_id' => Department::first()->id,
		'question' => 'What is a "dateline" in a press release?',
		'a' => 'Lorem Ipsum is simply dummy text of the printing',
		'b' => 'Lorem Ipsum is simply dummy text of the printing',
		'c' => 'Lorem Ipsum is simply dummy text of the printing',
		'd' => 'Lorem Ipsum is simply dummy text of the printing',
		'more_info' => 'http://www.upworktestanswers.com/odesk-test-answers/miscellaneous-certifications/business-writing-skills-certification-answers-2015.html',
		'answer' => 'a',
		'created_at' => '2018-07-16 05:48:24',
		'updated_at' => '2018-07-16 05:48:24',
	]);

DB::table('questions')->insert([
		'department_id' => Department::first()->id,
		'question' => 'How long should your memo be?',
		'a' => 'Lorem Ipsum is simply dummy text of the printing',
		'b' => 'Lorem Ipsum is simply dummy text of the printing',
		'c' => 'Lorem Ipsum is simply dummy text of the printing',
		'd' => 'Lorem Ipsum is simply dummy text of the printing',
		'more_info' => 'http://www.upworktestanswers.com/odesk-test-answers/miscellaneous-certifications/business-writing-skills-certification-answers-2015.html',
		'answer' => 'a',
		'created_at' => '2018-07-16 05:48:24',
		'updated_at' => '2018-07-16 05:48:24',
	]);

DB::table('questions')->insert([
		'department_id' => Department::first()->id,
		'question' => 'What should you always include when writing a business email?',
		'a' => 'Lorem Ipsum is simply dummy text of the printing',
		'b' => 'Lorem Ipsum is simply dummy text of the printing',
		'c' => 'Lorem Ipsum is simply dummy text of the printing',
		'd' => 'Lorem Ipsum is simply dummy text of the printing',
		'more_info' => 'http://www.upworktestanswers.com/odesk-test-answers/miscellaneous-certifications/business-writing-skills-certification-answers-2015.html',
		'answer' => 'a',
		'created_at' => '2018-07-16 05:48:24',
		'updated_at' => '2018-07-16 05:48:24',
	]);

DB::table('questions')->insert([
		'department_id' => Department::first()->id,
		'question' => 'SEO -Search Engine optimization',
		'a' => 'search Engine Manipulation',
		'b' => 'Search Engine Marketing',
		'c' => 'Social Ethical Marketing',
		'd' => 'Safe Easy Marketing',
		'answer' => 'a',
		'created_at' => '2018-07-16 05:48:24',
		'updated_at' => '2018-07-16 05:48:24',
	]);

DB::table('questions')->insert([
		'department_id' => Department::first()->id,
		'question' => 'What does PPC mean?',
		'a' => 'Pay Per Click',
		'b' => 'Personal and Private Computer',
		'c' => 'Proper Price Concept',
		'd' => 'Price Per Click',
		'answer' => 'a',
		'created_at' => '2018-07-16 05:48:24',
		'updated_at' => '2018-07-16 05:48:24',
	]);

DB::table('questions')->insert([
		'department_id' => Department::first()->id,
		'question' => 'Maximum Page Rank a Website can achieve is?',
		'a' => '4',
		'b' => '7',
		'c' => '9',
		'd' => '10',
		'answer' => 'a',
		'created_at' => '2018-07-16 05:48:24',
		'updated_at' => '2018-07-16 05:48:24',
	]);

DB::table('questions')->insert([
		'department_id' => Department::first()->id,
		'question' => 'Placing Hidden text on web page is?',
		'a' => 'Black - Hat SEO technique',
		'b' => 'White - Hat SEO technique',
		'c' => 'Yellow - Hat SEO trick',
		'd' => 'Green - Hat SEO trick',
		'answer' => 'a',
		'created_at' => '2018-07-16 05:48:24',
		'updated_at' => '2018-07-16 05:48:24',
	]);

DB::table('questions')->insert([
		'department_id' => Department::first()->id,
		'question' => 'Which of the below is the best URL format for Humans and Search Engines?',
		'a' => 'www.website.com/internet-marketing/seo.asp',
		'b' => 'www.website.com/?id=180&page=9',
		'c' => 'www.website.com/page9.html',
		'd' => 'www.website.com/new/01/',
		'answer' => 'a',
		'created_at' => '2018-07-16 05:48:24',
		'updated_at' => '2018-07-16 05:48:24',
	]);

DB::table('questions')->insert([
		'department_id' => Department::first()->id,
		'question' => 'Number of characters recommended for Title Tag?',
		'a' => '120',
		'b' => '250',
		'c' => '65',
		'd' => '100',
		'answer' => 'a',
		'created_at' => '2018-07-16 05:48:24',
		'updated_at' => '2018-07-16 05:48:24',
	]);

DB::table('questions')->insert([
		'department_id' => Department::first()->id,
		'question' => 'Which query will give list of webpages indexed by a particular search engine on given domain',
		'a' => 'list:http://www.websitename.com',
		'b' => 'link:http://www.websitename.com',
		'c' => 'webpage:http://www.websitename.com',
		'd' => 'site:http://www.websitename.com',
		'answer' => 'a',
		'created_at' => '2018-07-16 05:48:24',
		'updated_at' => '2018-07-16 05:48:24',
	]);

DB::table('questions')->insert([
		'department_id' => Department::first()->id,
		'question' => 'Which one of the below is considered to be unethical SEO practice?',
		'a' => 'Placing Hidden text on webpage',
		'b' => 'Having 2000 words of original content',
		'c' => 'Have more then 25 Images on webpage',
		'd' => 'Having a complete flash website',
		'answer' => 'a',
		'created_at' => '2018-07-16 05:48:24',
		'updated_at' => '2018-07-16 05:48:24',
	]);

DB::table('questions')->insert([
		'department_id' => Department::first()->id,
		'question' => 'Good Content can be described as',
		'a' => 'Keyword Rich',
		'b' => 'Focused and Informative',
		'c' => 'Interesting and Original',
		'd' => 'All of the Above',
		'answer' => 'a',
		'created_at' => '2018-07-16 05:48:24',
		'updated_at' => '2018-07-16 05:48:24',
	]);

DB::table('questions')->insert([
		'department_id' => Department::first()->id,
		'question' => 'When an Internet user clicks on a banner ad or a search result listing the page that opens is ',
		'a' => 'home page',
		'b' => 'navigation page',
		'c' => 'landing page',
		'd' => 'first page',
		'answer' => 'a',
		'created_at' => '2018-07-16 05:48:24',
		'updated_at' => '2018-07-16 05:48:24',
	]);





}
}
