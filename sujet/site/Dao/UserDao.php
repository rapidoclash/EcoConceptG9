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
	public function userExist($userId, $userPwd) {
		$stmt = $this->_db->prepare(
			"SELECT userId FROM user WHERE userId = ? AND userPwd = ?"
		);
		$stmt->execute([$userId, $userPwd]);
		return $stmt->fetch() !== false;
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

    	$stmt->execute();
	}
  
    /**
	 * Modifieur sur l'instance pdo de connexion 
	 */
     public function setDb(PDO $db) {
        $this->_db = $db;
    }
	
}
