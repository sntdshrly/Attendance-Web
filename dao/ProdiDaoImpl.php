<?php
class ProdiDaoImpl
{
    public function fetchAllProdi() {
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT id_prodi, name_prodi, tingkatan_prodi FROM prodi';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'prodi');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }

    public function fetchOption() {
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT id_prodi, name_prodi FROM prodi';
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'prodi');
        $stmt->execute();
        $link = null;
        return $stmt->fetchAll();
    }

    public function fetchProdiById($id) {
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'SELECT id_prodi,name_prodi FROM prodi WHERE id_prodi = ?';
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $link = null;
        return $stmt->fetchObject('prodi');
    }

    public function saveProdi(prodi $prodi) {
        $result = 0;
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'INSERT INTO prodi(id_prodi, name_prodi, tingkatan_prodi) VALUES (?,?,?)';
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $prodi->getIdProdi());
        $stmt->bindValue(2, $prodi->getNameProdi());
        $stmt->bindValue(3, $prodi->getTingkatanProdi());
        $link->beginTransaction();
        if ($stmt->execute()) {
            $link->commit();
            $result = 1;
        } else {
            $link->rollBack();
        }
        $link = null;
        return $result;
    }

    public function updateProdi(prodi $prodi) {
        $result = 0;
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'UPDATE prodi SET name_prodi = ?, tingkatan_prodi = ? WHERE id = ?';
        $stmt = $link->prepare($query);
        $stmt->bindValue(3, $prodi->getIdProdi());
        $stmt->bindValue(1, $prodi->getNameProdi());
        $stmt->bindValue(2, $prodi->getTingkatanProdi());
        $link->beginTransaction();
        if ($stmt->execute()) {
            $link->commit();
            $result = 1;
        } else {
            $link->rollBack();
        }
        $link = null;
        return $result;
    }

    public function deleteProdi($deletedIdProdi) {
        $result = 0;
        $link = ConnectionUtil::getMySQLConnection();
        $query = 'DELETE FROM prodi WHERE id_prodi = ?';
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $deletedIdProdi, PDO::PARAM_INT);
        $link->beginTransaction();
        if ($stmt->execute()) {
            $link->commit();
            $result = 1;
        } else {
            $link->rollBack();
        }
        $link = null;
        return $result;
    }
}