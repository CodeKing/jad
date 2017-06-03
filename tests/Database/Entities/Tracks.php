<?php

namespace Jad\Database\Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="Jad\Database\Repositories\TracksRepository")
 * @ORM\Table(name="tracks")
 * @Jad\Map\Annotations(type="track")
 */
class Tracks
{
    /**
     * @ORM\Id
     * @ORM\Column(name="TrackId", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="Name", type="string", length=200)
     */
    protected $name;

    /**
     * @ORM\OneToOne(targetEntity="Albums")
     * @ORM\JoinColumn(name="AlbumId", referencedColumnName="AlbumId")
     */
    protected $album;

    /**
     * @ORM\Column(name="Composer", type="string", length=220)
     */
    protected $composer;

    /**
     * @ORM\Column(name="UnitPrice", type="decimal", precision=10, scale=2)
     */
    protected $price;

    /**
     * Many Users have Many Groups.
     * @ORM\ManyToMany(targetEntity="Playlists")
     * @ORM\JoinTable(name="playlist_track",
     *      joinColumns={@ORM\JoinColumn(name="TrackId", referencedColumnName="TrackId")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="PlaylistId", referencedColumnName="PlaylistId")}
     *      )
     */
    protected $playlists;

    /**
     * Playlists constructor.
     */
    public function __construct()
    {
        $this->playlists =  new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getPlaylists()
    {
        return $this->playlists;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
}
