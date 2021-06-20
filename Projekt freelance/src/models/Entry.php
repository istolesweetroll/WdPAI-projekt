<?php

class Entry
{
private $project_id;
private $entry_date;
private $entry_length;
private $entry_description;

    /**
     * Entry constructor.
     * @param $project_id
     * @param $entry_date
     * @param $entry_length
     * @param $entry_description
     */
    public function __construct($project_id, $entry_date, $entry_length, $entry_description)
    {
        $this->project_id = $project_id;
        $this->entry_date = $entry_date;
        $this->entry_length = $entry_length;
        $this->entry_description = $entry_description;
    }

    /**
     * @return mixed
     */
    public function getProjectId()
    {
        return $this->project_id;
    }

    /**
     * @param mixed $project_id
     */
    public function setProjectId($project_id): void
    {
        $this->project_id = $project_id;
    }

    /**
     * @return mixed
     */
    public function getEntryDate()
    {
        return $this->entry_date;
    }

    /**
     * @param mixed $entry_date
     */
    public function setEntryDate($entry_date): void
    {
        $this->entry_date = $entry_date;
    }

    /**
     * @return mixed
     */
    public function getEntryLength()
    {
        return $this->entry_length;
    }

    /**
     * @param mixed $entry_length
     */
    public function setEntryLength($entry_length): void
    {
        $this->entry_length = $entry_length;
    }

    /**
     * @return mixed
     */
    public function getEntryDescription()
    {
        return $this->entry_description;
    }

    /**
     * @param mixed $entry_description
     */
    public function setEntryDescription($entry_description): void
    {
        $this->entry_description = $entry_description;
    }

}