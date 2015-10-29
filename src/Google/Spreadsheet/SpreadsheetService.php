<?php
/**
 * Copyright 2013 Asim Liaquat
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *    http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
/**
 * Spreadsheet Service.
 *
 * @package    Google
 * @subpackage Spreadsheet
 * @author     Asim Liaquat <asimlqt22@gmail.com>
 */
class Google_Spreadsheet_SpreadsheetService
{
    /**
     * Fetches a list of spreadhsheet spreadsheets from google drive.
     *
     * @return Google_Spreadsheet_SpreadsheetFeed
     */
    public function getSpreadsheets()
    {
        return new Google_Spreadsheet_SpreadsheetFeed(
            Google_Spreadsheet_ServiceRequestFactory::getInstance()->get('feeds/spreadsheets/private/full')
        );
    }

    /**
     * Fetches a single spreadsheet from google drive by id if you decide
     * to store the id locally. This can help reduce api calls.
     *
     * @param string $id the url of the spreadsheet
     *
     * @return Google_Spreadsheet_Spreadsheet
     */
    public function getSpreadsheetById($id)
    {
        return new Google_Spreadsheet_Spreadsheet(
            new SimpleXMLElement(
               Google_Spreadsheet_ServiceRequestFactory::getInstance()->get('feeds/spreadsheets/private/full/'. $id)
            )
        );
    }
    
    /**
     * Returns a list feed of the specified worksheet.
     * 
     * @see Google_Spreadsheet_Worksheet::getWorksheetId()
     * 
     * @param string $worksheetId
     * 
     * @return Google_Spreadsheet_ListFeed
     */
    public function getListFeed($worksheetId)
    {
        return new Google_Spreadsheet_ListFeed(
            Google_Spreadsheet_ServiceRequestFactory::getInstance()->get("feeds/list/{$worksheetId}/od6/private/full")
        );
    }
    
    /**
     * Returns a cell feed of the specified worksheet.
     * 
     * @see Google_Spreadsheet_Worksheet::getWorksheetId()
     * 
     * @param string $worksheetId
     * 
     * @return Google_Spreadsheet_CellFeed
     */
    public function getCellFeed($worksheetId)
    {
        return new Google_Spreadsheet_CellFeed(
            Google_Spreadsheet_ServiceRequestFactory::getInstance()->get("feeds/cells/{$worksheetId}/od6/private/full")
        );
    }
}
