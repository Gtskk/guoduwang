<?php namespace Gtskk\Storage\Member;

interface MemberInterface
{
	/**
	 * 获取指定数目的会员
	 * @return Collection 会员Collection
	 */
	public function limitAll();

	/**
	 * 查询指定id的会员，查不到就抛出错误
	 * @param  int $id 会员ID
	 * @return Member  会员对象
	 */
	public function findOrFail($id);

	/**
	 * 创建新会员
	 * @param  array $input 注册有关数据数组
	 * @return Member  会员对象
	 */
	public function create($input);

	/**
	 * 删除指定id的会员
	 * @param  int $id 会员ID
	 * @return boolean  是否删除成功标记
	 */
	public function destroy($id);

	/**
	 * 还原指定id的会员
	 * @param  int $id 会员ID
	 * @return boolean  是否还原成功标记
	 */
	public function restore($id);

	/**
	 * 还原多个id的会员
	 * @param  array $ids 会员ID数组
	 * @return boolean  是否还原成功标记
	 */
	public function restoreMany($ids);

	/**
	 * 分页获取会员
	 * @param  int $page  当前页码
	 * @param  int $limit 获取总数目
	 * @return object  用于构建分页的有关数据
	 */
	public function paginateSelect($page, $limit);

	public function paginateDelete($limit);

	public function getRecentMembers($limit);

	public function search($q);
}