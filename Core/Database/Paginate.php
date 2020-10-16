<?php
/**
 * Esta clase se encarga de gestionar las peticiones por paginacion
 */

namespace Core\Database;

use PDOException;

class Paginate
{
	const DEFAULT_LIMIT = 20;
	const DEFAULT_OFFSET = 0;
	protected $sql;
	protected $page;
	protected $linesPerPage;

	public function __construct($sql, $page, $linesPerPage)
	{
		if ($sql instanceof Finder) {
			$sql->limit($linesPerPage);
			$sql->offset($offset);
			$this->sql = $sql::getSql();
		} elseif (is_string($sql)) {
			$offset = $page * $linesPerPage;
			switch (TRUE) {
				case (stripos($sql, 'LIMIT') && strpos($sql, 'OFFSET')) :
				// no necesita acciones
				break;
				case (stripos($sql, 'LIMIT')) :
					$sql .= ' LIMIT ' . self::DEFAULT_LIMIT;
					break;
				case (stripos($sql, 'OFFSET')) :
					$sql .= ' OFFSET ' . self::DEFAULT_OFFSET;
					break;
				default :
					$sql .= ' LIMIT ' . self::DEFAULT_LIMIT;
					$sql .= ' OFFSET ' . self::DEFAULT_OFFSET;
					break;
			}
		}
		$this->sql = preg_replace('/LIMIT \d+.*OFFSET \d+/Ui',
		'LIMIT ' . $linesPerPage . ' OFFSET ' . $offset,
		$sql);
	}

	public function paginate( Connection $connection, $fetchMode, $params = array())
	{
		try {
			$stmt = $connection->pdo->prepare($this->sql);
			if (!$stmt) return FALSE;
			if ($params) {
				$stmt->execute($params);
			} else {
				$stmt->execute();
			}
			while ($result = $stmt->fetch($fetchMode)) yield $result;
		} catch (PDOException $e) {
			error_log($e->getMessage());
			return FALSE;
		} catch (Throwable $e) {
			error_log($e->getMessage());
			return FALSE;
		}
	}

	public function getSql()
	{
		return $this->sql;
	}
}