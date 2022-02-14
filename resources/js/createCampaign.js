import axios from "axios";
import React, { useState, useEffect } from 'react';
import ReactDOM from 'react-dom';



function NewCampaignForm(){

    const [selectedClient, setSelectedClient] = useState([]);
    const [clientDetails, setClientDetails] = useState([]);
    const [isPending, setIsPending] = useState(false);

    const [client, setClient] = useState("");
    const [brand, setBrand] = useState("");
    const [campaignName, setCampaignName] = useState("");
    const [clientApproval, setClientApproval] = useState("");
    const [startDate, setStartDate] = useState("");
    const [endDate, setEndDate] = useState("");
    const [notes, setNotes] = useState("");

    useEffect(() => {
        axios.get("/api/clients").then((response) => {
            setClientDetails(response.data);
        })
    }, []);


    const selectedClientOptions = (e) => {
        const clientName = e.target.value;
        if(clientName == "none"){
            setSelectedClient([]);
        } else {
            axios.get(`/api/clients/${clientName}`).then((response) => {
                setSelectedClient(response.data);
                setClient(clientName);   
                
            });
        }


    }



    const handleSubmit = (e) => {
        setIsPending(true);
        e.preventDefault();
        const newCampaign = [client, brand, campaignName, clientApproval, startDate, endDate, notes];
        axios.post("/api/new-campaign", {
            client: client,
            brand: brand,
            campaignName: campaignName,
            clientApproval: clientApproval,
            startDate: startDate,
            endDate: notes,

        }).then((response) => {
            console.log(response.data);
            if(response.data == "successfull"){
               window.location.href = "/campaigns";
            }
        })
        
    }

    
    return(
        <>


                    <div className="row">
                            <div className="col-12">
                                <div className="card">
                                    <div className="card-body">


                                        <form onSubmit={handleSubmit}>
                                            <div className="row">
                                                <div className="col-md-6">
                                                <div className="mb-3">
                                                    <label className="form-label">Client</label>
                                                    <select id="formrow-inputState" onChange={selectedClientOptions} className="form-select">
                                                    <option value="none">Choose...</option>
                                                    {clientDetails.map((value, key) => <option key={key} value={value.client_name}>{value.client_name}</option>)}
                                                    </select>
                                                </div>
                                                </div>
                                                <div className="col-md-6">
                                                <div className="mb-3">
                                                    <label className="form-label">Brand</label>
                                                    <select id="formrow-inputState" className="form-select" onChange={(e) => setBrand(e.target.value)}>
                                                    <option>Choose...</option>
                                                    {selectedClient.map((value, key) => <option key={key} value={value}>{value}</option>)}
                                                    </select>
                                                </div>
                                                </div>
                                            </div>
                                            <div className="row">
                                                <div className="col-md-8">
                                                <div className="mb-3">
                                                    <label className="form-label">Campaign Name</label>
                                                    <input type="text" className="form-control" id="formrow-email-input" onChange={(e) => setCampaignName(e.target.value)} />
                                                </div>
                                                </div>
                                                <div className="col-md-4">
                                                <div className="mb-3">
                                                    <label className="form-label">Client Approval</label>
                                                    <select id="formrow-inputState" className="form-select" onChange={(e) => setClientApproval(e.target.value)}>
                                                    <option value="none">Choose...</option>
                                                    <option value="Approved">Approved</option>
                                                    <option value="Pending">Pending</option>
                                                    </select>
                                                </div>
                                                </div>
                                            </div>
                                            <div className="row">
                                                <div className="col-md-6">
                                                <div className="mb-3">
                                                    <label htmlFor="formrow-email-input" className="form-label">Campaign Start Date</label>
                                                    <input className="form-control" type="date"  onChange={(e) => setStartDate(e.target.value)} id="example-date-input" />
                                                </div>
                                                </div>
                                                <div className="col-md-6">
                                                <div className="mb-3">
                                                    <label htmlFor="formrow-password-input" className="form-label">Campaign End Date</label>
                                                    <input className="form-control" type="date"  onChange={(e) => setEndDate(e.target.value)} id="example-date-input" />
                                                </div>
                                                </div>
                                            </div>

                                            <div className="mb-3">
                                                    <label htmlFor="formrow-email-input" className="form-label">Campaign Notes</label>
                                                    <textarea id="basicpill-address-input" className="form-control" rows="2" onChange={(e) => setNotes(e.target.value)}></textarea>
                                            </div>

                                            
                                            <div>
                                            {!isPending && <button type="submit" className="btn btn-success w-md">Create Campaign</button>}
                                            {isPending && <button type="submit" className="btn btn-primary w-md" disabled>Creating new campaign. Please wait....</button>}
                                            
                                                
                                            </div>
                                        </form>





                                    </div>
                                </div>
                            </div>
                        </div>{/** end of div row card */}


        
        </>
    );
}

export default NewCampaignForm;


if (document.getElementById('createCampaign')) {
    ReactDOM.render(<NewCampaignForm />, document.getElementById('createCampaign'));
}