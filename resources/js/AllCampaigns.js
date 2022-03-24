import axios from "axios";
import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';
import moment from "moment";
import Skeleton from 'react-loading-skeleton'
import 'react-loading-skeleton/dist/skeleton.css';





function AllCampaignsTable(){

    let m = moment();
    const [allCampaigns, setAllCampaigns] = useState([]);
    const [isPending, setIsPending] = useState(true);
    
 

     
    

    useEffect(() => {

        axios.get("/campaigns/api").then((response) => {
            setAllCampaigns(response.data);
            setIsPending(false);
        });


    }, []);

    
    return(
        <>
        
                            <div className="row">
                                <div className="col-12">
                                    <div className="card">
                                            <div className="card-body">
                                                <table className="table table-striped mb-0">
        
                                                    <thead>
                                                        <tr>
                                                            <th>Campaign Name</th>
                                                            <th>Brand</th>
                                                            <th>Start Date</th>
                                                            <th>Planner</th>
                                                            <th>Created Date</th>
                                                            <th>Campaign Status</th>
                                                            <th>Actions</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        {isPending && 
                                                        <tr>
                                                            <td><Skeleton height={30}/></td>
                                                            <td><Skeleton height={30}/></td>
                                                            <td><Skeleton height={30}/></td>
                                                            <td><Skeleton height={30}/></td>
                                                            <td><Skeleton height={30}/></td>
                                                            <td><Skeleton height={30}/></td>
                                                            <td><Skeleton height={30}/></td>
                                                        </tr>
                                                        }
                                                        
                                                        
                                                        {allCampaigns.map((value,key) => {
                                                            return(
                                                                <tr key={key}>
                                                                    <td>{value.campaign_name}</td>
                                                                    <td>{value.brandName}</td>
                                                                    <td>{value.startDate}</td>
                                                                    <td>{value.userCreated}</td>
                                                                    <td>{moment(value.created_at).format('MMMM Do YYYY, h:mm:ss a')}</td>
                                                                    <td><span className="badge rounded-pill font-size-10" className={value.clientApproval === "Approved" ? "badge-soft-success" : value.clientApproval === "Pending" ? "badge-soft-danger" : "badge-soft-warning"}>{value.clientApproval}</span></td>   
                                                                    <td><a href={`/campaign/${value.campaign_id}`}><span className="bx bx-pencil"></span></a></td> 
                                                                                                                          
                                                                </tr>
                                                            )
                                                        })}
                                                      
                                                    </tbody>
                                                </table>
                                                <div>
                                            
                                                </div>
                                            </div>{/** end of div card body */}
                                            
                                    </div>{/** end of div card */}
                                    


                                </div>
                            </div>{/** end of div row */}
        </>
    );
}

export default AllCampaignsTable;


if (document.getElementById('campaigns')) {
    ReactDOM.render(<AllCampaignsTable />, document.getElementById('campaigns'));
}