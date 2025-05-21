<?php
class TodoDTO{
   
    private ?int $id = null;
   
   
    private ?string $title = null;

    
    private ?\DateTimeImmutable $createdAt = null;

    
    private ?\DateTimeImmutable $updatedAt = null;

    
    private ?bool $completed = false;

    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(?int $id){
        $this->id = $id;
    }


    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }
   
    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }



    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }
   
  

    public function isCompleted(): ?bool
    {
        return $this->completed;
    }

    public function setCompleted(bool $completed): static
    {
        $this->completed = $completed;

        return $this;
    }


    /**
     * Set the value of createdAt
     *
     * @param ?\DateTimeImmutable $createdAt
     *
     * @return self
     */
    public function setCreatedAt(?\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }


    /**
     * Set the value of updatedAt
     *
     * @param ?\DateTimeImmutable $updatedAt
     *
     * @return self
     */
    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}