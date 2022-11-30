<?php
// Sites to monitor status
$sitesToMonitor = ['sitea.com', 'siteb.com', 'sitec.com'];

$discovery = new DiscoverySitesToMonitor($sitesToMonitor);
$itens = $discovery->itensToMonitor();

echo json_encode($itens, JSON_PRETTY_PRINT);

class DiscoverySitesToMonitor
{
    /**
     * __construct
     *
     * @param  mixed $sites
     * @return void
     */
    public function __construct(array $sites)
    {
        $this->sites = $sites;
    }

    /**
     * getTimeout
     * timeout to user on item prototype 
     *
     * @return void
     */
    public function getTimeout()
    {
        return '10s';
    }

    /**
     * getIntervalToCheck
     * interval between each check
     *
     * @return void
     */
    public function getIntervalToCheck()
    {
        return '300s';
    }

    
    /**
     * itensToMonitor
     * list of itens (sites) to monitor and other values
     *
     * @return json
     */
    public function itensToMonitor()
    {
        foreach ($this->sites as $key => $site) {
            $data['data'][$key]["{#SITEURL}"] = $site;
            $data['data'][$key]["{#TIMEOUT}"] = $this->getTimeout();
            $data['data'][$key]["{#INTERVALTOCHECK}"] = $this->getIntervalToCheck();
        }

        return $data;
    }
}