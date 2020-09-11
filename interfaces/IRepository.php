<?php


namespace app\interfaces;

interface IRepository
{
  function getOne($id);
  function getAll();
  function getTableName() : string ;
}