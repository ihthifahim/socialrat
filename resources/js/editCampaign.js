import axios from "axios";
import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';



function EditCampaignForm(){

    
    const [campaignDetails, setCampaignDetails] = useState({});
    const [clientDetails, setClientDetails] = useState([]);
    const [brandName, setBrandName] = useState([]);
    const [selectedClient, setSelectedCLient] = useState([]);
    const [campaignActivities, setCampaignActivities] = useState([]);

    const [isPending, setIsPending] = useState(false);

    //form values
    const [client, setClient] = useState("");
    const [brand, setBrand] = useState("");
    const [campaignName, setCampaignName] = useState("");
    const [clientApproval, setClientApproval] = useState("");
    const [startDate, setStartDate] = useState("");
    const [endDate, setEndDate] = useState("");
    const [notes, setNotes] = useState("");
    // const [selectedClient, setSelectedClient] = useState([]);
    // const [clientDetails, setClientDetails] = useState([]);
    // const [isPending, setIsPending] = useState(false);

    // const [client, setClient] = useState("");
    // const [brand, setBrand] = useState("");
    // const [campaignName, setCampaignName] = useState("");
    // const [clientApproval, setClientApproval] = useState("");
    // const [startDate, setStartDate] = useState("");
    // const [endDate, setEndDate] = useState("");
    // const [notes, setNotes] = useState("");



    useEffect(() => {
        axios.get(`/campaign/${campaignid}/api/`).then((response) => {
            setCampaignDetails(response.data);
            setClient(response.data.client);
            setCampaignName(response.data.campaign_name);
            setBrand(response.data.brandName);
            setClientApproval(response.data.clientApproval);
            setStartDate(response.data.startDate);
            setEndDate(response.data.endDate);
            setNotes(response.data.notes);
        });

        axios.get("/clients/api/").then((response) => {
            setClientDetails(response.data);
        });

      

    }, []);




    useEffect(() => {
        axios.get(`/clients/${campaignDetails.client}/api/`).then((response) => {
            setSelectedCLient(response.data);
            
        });


    }, [campaignDetails]);



   const selectedClientOptions = (e) => {
    const clientName = e.target.value;
    
    if(clientName == "none"){
        setSelectedCLient([]);
    } else {
        axios.get(`/clients/${clientName}/api`).then((response) => {
            setSelectedCLient(response.data);
            setClient(clientName);
        });
    }

}


   
   const handleSubmit = (e) => {
    setIsPending(true);
     e.preventDefault();
     axios.post("/campaign/edit/api", { campaignId: campaignid, campaignName: campaignName, client: client, brandName: brand, clientApproval: clientApproval, startDate: startDate, endDate: endDate, notes: notes}).then((response) => {
         console.log(response.data);
         
         window.location.reload();
         setIsPending(false);
        
     });
    
}


    
    return(
        <>



                                        <form onSubmit={handleSubmit}>
                                            <div className="row">
                                                <div className="col-md-6">
                                                <div className="mb-3">
                                                    <label className="form-label">Client</label>
                                                    <select id="formrow-inputState" onChange={selectedClientOptions}  className="form-select">
                                                    <option value="none">Choose...</option>
                                                    {clientDetails.map((value, key) => <option key={key} selected={campaignDetails.client == value.client_name} value={value.client_name}>{value.client_name}</option>)}
                                                    </select>
                                                </div>
                                                </div>
                                                <div className="col-md-6">
                                                <div className="mb-3">
                                                    <label className="form-label">Brand</label>
                                                    <select id="formrow-inputState" className="form-select" onChange={(e) => { setBrand(e.target.value)}}>
                                                    <option >Choose...</option>
                                                    {selectedClient.map((value, key) => <option key={key} selected={campaignDetails.brandName == value} value={value}>{value}</option>)}
                                                    </select>
                                                </div>
                                                </div>
                                            </div>
                                            <div className="row">
                                                <div className="col-md-8">
                                                <div className="mb-3">
                                                    <label className="form-label">Campaign Name</label>
                                                    <input type="text" className="form-control" id="formrow-email-input" defaultValue={campaignDetails.campaign_name} onChange={(e) => setCampaignName(e.target.value)} />
                                                </div>
                                                </div>
                                                <div className="col-md-4">
                                                <div className="mb-3">
                                                    <label className="form-label">Client Approval</label>
                                                    <select id="formrow-inputState" className="form-select" onChange={(e) => setClientApproval(e.target.value)}>
                                                    <option value="none">Choose...</option>
                                                    <option value="Approved" selected={campaignDetails.clientApproval == "Approved"} >Approved</option>
                                                    <option value="Pending" selected={campaignDetails.clientApproval == "Pending"}>Pending</option>
                                                    </select>
                                                </div>
                                                </div>
                                            </div>
                                            <div className="row">
                                                <div className="col-md-6">
                                                <div className="mb-3">
                                                    <label htmlFor="formrow-email-input" className="form-label">Campaign Start Date</label>
                                                    <input className="form-control" type="date" id="example-date-input" defaultValue={campaignDetails.startDate} onChange={(e) => setStartDate(e.target.value)}/>
                                                </div>
                                                </div>
                                                <div className="col-md-6">
                                                <div className="mb-3">
                                                    <label htmlFor="formrow-password-input" className="form-label">Campaign End Date</label>
                                                    <input className="form-control" type="date" id="example-date-input" defaultValue={campaignDetails.endDate} onChange={(e) => setEndDate(e.target.value)}/>
                                                </div>
                                                </div>
                                            </div>

                                            <div className="mb-3">
                                                    <label htmlFor="formrow-email-input" className="form-label">Campaign Notes</label>
                                                    <textarea id="basicpill-address-input" className="form-control" rows="2" defaultValue={campaignDetails.notes} onChange={(e) => setNotes(e.target.value)}></textarea>
                                            </div>

                                            
                                            <div>
                                                {!isPending && <button type="submit" className="btn btn-primary w-md">Update Campaign Details</button>}
                                                {isPending && <button type="submit" className="btn btn-primary w-md" disabled>Please wait campaign updating...</button>}
                                                
                                            </div>
                                        </form>





        
        </>
    );
}

export default EditCampaignForm;


if (document.getElementById('editCampaign')) {
    ReactDOM.render(<EditCampaignForm />, document.getElementById('editCampaign'));
}