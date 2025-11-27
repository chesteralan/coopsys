import { getMemberData } from "@/services/member";
import { ApiResponse, MemberItem } from "@/typing/member";
import { useEffect, useState } from "react";
   
export const useGetMemberData = (id: string) => {
    
    const [loading, setLoading] = useState(false);
    const [data, setData] = useState<MemberItem>({} as MemberItem);
    
    const fetchMemberData = async (id: string): Promise<ApiResponse<MemberItem>> => {
        const memberData = await getMemberData(id);
        return memberData;
    }

    useEffect(() => {
        setLoading(true);
        fetchMemberData(id).then(({ data }) => setData(data)).finally(() => setLoading(false));
    }, [id]);

    return { loading, data }
}