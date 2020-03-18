<?php
namespace App\Repository\Eloquent;

use App\Repository\contract\NewsInterface;
use App\News;

class NewsImpl implements NewsInterface
{
    /**
     * @var $model protected variable to be used by the constructor.
     */

    protected $model;

    /**
     * @param $model instance of news model
     */

    public function __construct(News $model)
    {
        $this->model = $model;
    }

    /**
     * Save an array of values.
     * @param $data array of values
     * @return array
     */
    public function create($data)
    {
        return $this->model->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'news_type' => $data['news_type'],
            'posted_by' => $data['posted_by']
        ]);
    }

    /**
     * @param $id unique id of news
     *        $data array of news attributes that we want to update.
     * @return array
     */
    public function update($id, $data)
    {
        return $this->model->find($id)->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'news_type' => $data['news_type'],
            'posted_by' => $data['posted_by']
        ]);
    }

    /**
     * @return array
     */
    public function index()
    {
        return $this->model::paginate(25);
    }

    /**
     * @param $id unique Id of News
     *
     * @method get the details of a news using Id.
     * @return mixed
     */
    public function find($id)
    {
        return $this->model::with(['newsType'])->find($id);
    }

    /**
     * @param $id unique news id
     * @return int
     */
    public function delete($id)
    {
        $check = $this->find($id);
        if($check){
            return $this->find($id)->delete($id);
        }

        return null;

    }
}
