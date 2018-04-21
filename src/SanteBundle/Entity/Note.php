<?php

namespace SanteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Note
 *
 * @ORM\Table(name="note")
 * @ORM\Entity(repositoryClass="SanteBundle\Repository\NoteRepository")
 */
class Note
{
    /**
     * @var int
     *
     * @ORM\Column(name="idNote", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idNote;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $Note;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $Commentaire;

    /**
     * @return int
     */
    public function getIdNote()
    {
        return $this->idNote;
    }

    /**
     * @param int $idNote
     */
    public function setIdNote($idNote)
    {
        $this->idNote = $idNote;
    }

    /**
     * @return mixed
     */
    public function getNote()
    {
        return $this->Note;
    }

    /**
     * @param mixed $Note
     */
    public function setNote($Note)
    {
        $this->Note = $Note;
    }

    /**
     * @return mixed
     */
    public function getCommentaire()
    {
        return $this->Commentaire;
    }

    /**
     * @param mixed $Commentaire
     */
    public function setCommentaire($Commentaire)
    {
        $this->Commentaire = $Commentaire;
    }

}

