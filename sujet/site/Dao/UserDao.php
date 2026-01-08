<?php
/**
 * Gestionnaire de la classe user
 */
class UserDao {
	
	/** Instance de PDO pour se connecter à la BD */
	private $_db;
	
	/**
	 * Connexion à la BDD
	 */
	public function __construct($db) {
        $this->setDb($db);
    }
     
	/**
	 * Recherche d'un utilisateur en ce basant sur le couple ident/mdp
	 */
	public function checkPassword($userId, $userPwd) {
		$stmt = $this->_db->prepare(
			"SELECT userPwd FROM user WHERE userId = ?"
		);
		$stmt->execute([$userId]);
		$hashedPwd = $stmt->fetchColumn();
		if ($hashedPwd === false) {
			return false;
		}
		return password_verify($userPwd, $hashedPwd);
	}
	
	/**
	 * Recherche de l'existance d'un id
	 */
	public function idExist($userId) {
		$stmt = $this->_db->prepare("SELECT userId FROM user WHERE userId = ?");
		$stmt->execute([$userId]);
		return $stmt->fetch() !== false;
	}

	/**
	 * Récupération d'un utilisateur par son id
	 */
	public function getById($userId) {
		$stmt = $this->_db->prepare("SELECT * FROM user WHERE userId = ?");
		$stmt->execute([$userId]);
		$data = $stmt->fetch(PDO::FETCH_ASSOC);
		if ($data === false) {
			return null;
		}
		return new User($data);
	}
    
	
   /** 
    * Récupération de tous les users de la BDD
    */
    public function getList() {
		$stmt = $this->_db->prepare('SELECT * FROM user');
		$stmt->execute();
		
		$users = [];
		while ($donnees = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$users[] = new User($donnees);
		}
		return $users;
	}
	
     
	/**
	 * Ajout d'un nouvel utilisateur à la BDD
	 */
   public function add($user) {
  
		$stmt = $this->_db->prepare('INSERT INTO user(userId, userPwd)
									VALUES(?,?)');
		$stmt->bindValue(1, $user->getUserId());
		$stmt->bindValue(2, $user->getUserPwd());

    	return $stmt->execute();
	}
  
    /**
	 * Modifieur sur l'instance pdo de connexion 
	 */
     public function setDb(PDO $db) {
        $this->_db = $db;
    }
	
}
