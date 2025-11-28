import { getOverview, Overview } from "@/services/overviewService";
import { useOverviewActions } from "@/stores/overviewStore/overviewStore";
import { ApiResponse } from "@/typing/member";
import { useEffect, useState } from "react";

export const useOverview = () => {
  const { setTotalMembers, setActiveMembers, setInactiveMembers } =
    useOverviewActions();
  const [loading, setLoading] = useState(false);
  const [data, setData] = useState<Overview>({} as Overview);

  const fetchOverview = async (): Promise<ApiResponse<Overview>> => {
    const overview = await getOverview();
    return overview;
  };

  useEffect(() => {
    setLoading(true);
    fetchOverview()
      .then(({ data }) => {
        setData(data);
        setTotalMembers(data.total_members);
        setActiveMembers(data.active_members);
        setInactiveMembers(data.inactive_members);
      })
      .finally(() => setLoading(false));
  }, []);

  return { loading, data };
};
