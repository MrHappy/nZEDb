<?php
/**
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program (see LICENSE.txt in the base directory.  If
 * not, see:
 *
 * @link      <http://www.gnu.org/licenses/>.
 * @author    niel
 * @copyright 2019 nZEDb
 */

use Illuminate\Support\Facades\DB;
use zed\Nzedb;
use zed\database\MigrationWithLoadData;


class LoadDataIntoCategoriesTable extends MigrationWithLoadData
{
	public function up()
	{
		$this->loadDataInfile(
			[
				'filepath' => Nzedb::RESOURCES .
					'db' .
					DS .
					'schema' .
					DS .
					'data' .
					DS .
					'10-categories.tsv'
			]
		);

		DB::insert('INSERT INTO categories (id, title, parentid) VALUES (1000000,  \'Other\', NULL);');
		DB::update('UPDATE categories SET id = 0 WHERE id = 1000000;');
	}
}